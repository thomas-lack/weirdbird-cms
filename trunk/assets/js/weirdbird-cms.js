/**
 * weirdbird-cms ExtJS 4 Application
 *
 * @author: Thomas Lack
 */
Ext.application({
	name: 'WeirdbirdCMS',
	appFolder: 'assets/js/weirdbird-cms',

	// Switch between debug and productive console outputs
	debug: false,
	// the current username buffer
	username: null,
	// get the current language definitions on a shortcut
	lang: new WeirdbirdCMS.language.Definition(), // has to be loaded by the backend previously
	// we do not want to auto create the viewport, since we want to execute the launch method first
	autoCreateViewport: false,
	// remember the current module to prevent rendering it twice
	currentModule: null,

	controllers: [
			'Dashboard',
			'Template',
			'Structure',
			'Article',
			'FileManager',
			'User',
			'System'
	],

	models: [
			'Language',
			'Layout',
			'Module',
			'ArticleTreeNode'
	],

	// the languages store is safe to load at this point (via autoload), 
	// since no changes will be made via cms - available by using _cms.getStore('Languages')
	// 
	// usually the Layouts and Modules do not change, so it is also safe to load them at
	// startup. if needed, the Template controller has to make sure the data is reloaded on
	// a template change.
	stores: [
			'Languages',
			'Layouts',
			'Modules',
			'ArticlesTree'
	],

	/**
	 * set which content shall be loaded via ajax by clicking on a menu button
	 */
	registerNavHandlers: function() {
		if (this.debug) console.log('registering nav menu handlers');
		Ext.each(Ext.query('#navmenu-body > ul > li > a'), function(domEl, i, list) {
			var el = Ext.get(domEl),
				urlSuffix = el.dom.attributes['ajax'].value,
				clickFn = function() {
					_cms.updateNavigationMenu(urlSuffix);
					_cms.callerMapping(urlSuffix);
				};

			el.on('click', clickFn);
		});
	},

	/*
	 * Change color of the navigation menu on the fly
	 */
	updateNavigationMenu: function(categoryLink) {
		if (this.debug) console.log('resetting navigation menu to: ' + categoryLink);

		// remove big letters
		Ext.each(Ext.query('#navmenu-body > ul > li > a'), function(domEl) {
			Ext.get(domEl).removeCls('big bold');
		});

		// remove category indicator
		Ext.each(Ext.query('#navmenu-body > ul > li > a > span'), function(domEl) {
			Ext.get(domEl).destroy();
		});

		// add new big lettering and category indicator
		var el = Ext.get(Ext.query('#navmenu-body > ul > li > a[ajax=' + categoryLink + ']'));
		el.addCls('big bold');
		var t = document.createElement('span'); //<span class="icon right very-big">=</span>
		Ext.get(t).addCls('icon right very-big').setHTML('=');
		el.appendChild(t);
	},

	/**
	 * Helper method to provide functionality of module loading depending on the
	 * url suffix of the corresponding ajax call
	 * (see registerNavHandlers() or Dashboard.registerDashboardHandlers())
	 */
	callerMapping: function(module) {
		// check if the currently shown module is not the one which was clicked
		// (deleting it and rendering it again would lead to an error because of
		//  re-used component id's)
		if (this.currentModule === module)
			return;
		else
			this.currentModule = module;

		switch (module) {
			case 'dashboard':
				_cms.getController('Dashboard').createDashboard();
				break;
			case 'templates':
				_cms.getController('Template').populateTemplatesGrid();
				break;
			case 'structures':
				_cms.getController('Structure').populateStructuresGrid();
				break;
			case 'articles':
				// first we need to load the css files of the current template
				// (for the tinyMCE article editor)
				// afterwards the panel can be painted
				Ext.Ajax.request({
					url: 'cms/articles/css',
					success: function(response) {
						_cms.getController('Article').prepareArticlesPanel(Ext.JSON.decode(response.responseText));
					},
					failure: function(response) {
						Ext.MessageBox.alert('Error', _cms.lang.articles.message.error + ' (Error code ' + response.status + ').');
					}
				});
				break;
			case 'filemanager':
				_cms.getController('FileManager').populateFilesGrid();
				break;
			case 'user':
				_cms.getController('User').populateUsersGrid();
				break;
			case 'system':
				_cms.getController('System').populateSystemPanel();
				break;
			default:
				_cms.getController('Dashboard').registerDashboardHandlers();
		}
	},

	/**
	 * Helper method to add new panels to the content panel (replacing the old ones).
	 *
	 * Please note: parameter cmp has to be a component or component config object
	 */
	fillContentPanel: function(cmp) {
		var p = Ext.getCmp('contentPanel');
		p.removeAll();
		p.add(cmp);
		p.doLayout();
	},

	/**
	 * Let's get this rollin' by starting up all the needed things for the cms app
	 */
	launch: function() {
		// a little convenience - make the application object available through a shortform
		_cms = this;

		// override all treepanels with drag&drop, so that only leafs are draggable
		Ext.override(Ext.tree.ViewDragZone, {
			isPreventDrag: function(e, record) {
				return this.callOverridden(arguments) || !record.isLeaf();
			}
		});

		Ext.tip.QuickTipManager.init();

		// set the username
		_cms.username = Ext.get(Ext.query('body')[0]).dom.attributes['username'].value;

		// create the Viewport
		Ext.create('WeirdbirdCMS.view.Viewport');

		// init the viewport's main panel with the dashboard data
		_cms.getController('Dashboard').createDashboard();

		// register the handlers for the navigation bar
		_cms.registerNavHandlers();
	}
});