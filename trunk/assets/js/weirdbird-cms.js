Ext.define('WeirdbirdCMS', {
	// Switch between debug and productive console outputs
	debug: true,
	// since dashoard data is loaded via AJAX, we can buffer it for later use
	dashboardBuffer: null,
	// the current username buffer
	username: null,
	// get the current language definitions on a shortcut
	lang: new WeirdbirdCMS.language.Definition(),

	init:	function(){
		// override all treepanels with drag&drop, so that only leafs are draggable
		Ext.override(Ext.tree.ViewDragZone, {
			isPreventDrag: function(e, record) {
				return this.callOverridden(arguments) || !record.isLeaf();
			}
		});

		Ext.tip.QuickTipManager.init();
		
		// set initial values of buffer variables
		this.dashboardBuffer = null;
		this.username = Ext.get(Ext.query('body')[0]).dom.attributes['username'].value;
		
		// proceed with creating what the user sees and register the click handlers
		this.createViewport();
		this.registerNavHandlers();
		this.createDashboard();
	},

	/**
	* Handles the creation of a fullscreen user interface structure
	*/
	createViewport: function() {
		Ext.create('Ext.container.Viewport', {
			layout: 'border',
			items: [{
				region: 'north',
				html: '<img class="left" src="/assets/images/logo.png"/>'
					+ '<span class="serif headline dark-gray">weirdbird cms</span>'
					+ '<span class="right"><a href="cms/user/logout">Logout '
					+ '<span class="icon big dark-gray icon-space-top">v</span></a>'
					+ '</span>'
					+ '<span class="right right-padding-10">'
					+ '<span class="icon big dark-gray icon-space-top">L</span> ' + this.username
					+ '</span>',
				bodyCls: 'title',
				border: false
			}, {
				region: 'west',
				html: '<span class="sans-serif uppercase very-small gray">'+cms.lang.nav.headline+'</span>'
					+ '<ul class="sans-serif">'
					+ '<li><a href="#" ajax="dashboard" class="big bold">'+cms.lang.nav.dashboard+'<span class="icon right very-big">=</span></a></li>'
					+ '<li><a href="#" ajax="templates">'+cms.lang.nav.templates+'</a></li>'
					+ '<li><a href="#" ajax="structures">'+cms.lang.nav.structures+'</a></li>'
					+ '<li><a href="#" ajax="articles">'+cms.lang.nav.articles+'</a></li>'
					+ '<li><a href="#" ajax="filemanager">'+cms.lang.nav.filemanager+'</a></li>'
					+ '<li><a href="#" ajax="user">'+cms.lang.nav.user+'</a></li>'
					+ '<li><a href="#" ajax="system">'+cms.lang.nav.system+'</a></li>'
					+ '</ul>',
				bodyCls: 'navmenu',
				id: 'navmenu',
				width: 200,
				border: false
			}, {
				region: 'center',
				bodyCls: 'content',
				id: 'contentPanel',
				layout: 'fit',
				border: false
			}, {
				region: 'south',
				html: '<span class="sans-serif small">' 
					+ cms.lang.bottom.created
					+ ' '
					+ '<a href="http://twitter.com/thomaslack">Thomas Lack</a>'
					+ '. '
					+ cms.lang.bottom.moreinfo
					+ ' '
					+ '<a href="http://code.google.com/p/weirdbird-cms/">'
					+ cms.lang.bottom.moreinfo2
					+ '</a>.'
					+ '</span>',
				bodyCls: 'bottombar',
				border: false
			}]
		});
	},

	/**
	* Handles the creation of an initial content view: the dashboard
	*/
	createDashboard: function() {
		if (cms.dashboardBuffer != null) {
			cms.fillContentPanel({
				xtype: 'panel',
				title: cms.lang.dashboard.title,
				bodyCls: 'content',
				border: false,
				html: cms.dashboardBuffer
			});

			cms.registerDashboardHandlers();
		}
		else {
			Ext.Ajax.request({
				url: 'cms/dashboard',
				success: function(response) {
					cms.dashboardBuffer = response.responseText;
					cms.createDashboard();
				},
				failure: function(response) {
					Ext.MessageBox.alert('Error', cms.lang.dashboard.message.error + ' (Error code ' + response.status + ').');
				}
			});	
		}
	},

	/**
	* Helper method to provide functionality of module loading depending on the 
	* url suffix of the corresponding ajax call
	* (see registerNavHandlers() or registerDashboardHandlers())
	*/
	callerMapping: function(module) {
		switch (module) {
			case 'dashboard' : 
				cms.createDashboard();
				break;
			case 'templates' :
				cms.populateTemplatesGrid();
				break;
			case 'structures' :
				cms.populateStructuresGrid();
				break;
			case 'articles' :
				// first we need to load the css files of the current template
				// (for the tinyMCE article editor)
				// afterwards the panel can be painted
				Ext.Ajax.request({
					url: 'cms/articles/css',
					success: function(response) {
						cms.prepareArticlesPanel(Ext.JSON.decode(response.responseText));
					},
					failure: function(response) {
						Ext.MessageBox.alert('Error', cms.lang.articles.message.error + ' (Error code ' + response.status + ').');
					}
				});
				break;
			case 'filemanager' :
				cms.populateFilesGrid();
				break;
			case 'user':
				cms.populateUsersGrid();
				break;
			case 'system':
				cms.populateSystemPanel();
				break;
			default:
				cms.registerDashboardHandlers();
		}
	},

	/**
	* set which content shall be loaded via ajax by clicking on a menu button
	*/
	registerNavHandlers: function(){
		if (this.debug) console.log('registering nav menu handlers');
		Ext.each(Ext.query('#navmenu-body > ul > li > a'), function(domEl, i, list){
			var el = Ext.get(domEl);
			var urlSuffix = el.dom.attributes['ajax'].value;
			
			var clickFn = function() {
				cms.updateNavigationMenu(urlSuffix);
				cms.callerMapping(urlSuffix);
			};
			
			el.on('click', clickFn);
		});
	},
	
	/**
	* register clickable buttons for the dashboard
	*/
	registerDashboardHandlers: function() {
		if (this.debug) console.log('registering dashboard handlers');
		Ext.each(Ext.query('.dashboard-list > li'), function(domEl, i, list){
			var el = Ext.get(domEl);
			var urlSuffix = el.dom.attributes['href'].value;
			
			var clickFn = function() {
				cms.updateNavigationMenu(urlSuffix);
				cms.callerMapping(urlSuffix);
			};

			el.addClsOnOver('hover-dashboard');
			el.on('click', clickFn);
		});
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
	
	/*
	* Change color of the navigation menu on the fly
	*/
	updateNavigationMenu: function(categoryLink) {
		if (this.debug) console.log('resetting navigation menu to: ' + categoryLink);
		
		// remove big letters
		Ext.each(Ext.query('#navmenu-body > ul > li > a'), function(domEl){
			Ext.get(domEl).removeCls('big bold');
		});
		
		// remove category indicator
		Ext.each(Ext.query('#navmenu-body > ul > li > a > span'), function(domEl){
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
	* Load template data into the template grid
	*/
	populateTemplatesGrid: function() {
		if (this.debug) console.log('populating template data grid');
		
		Ext.create('Ext.data.Store', {
		    storeId:'templatesStore',
		    fields: ['id', {name:'active', type:'bool'}, 'name', 'standardlayout', 'description', 'folder_images', 
		    	'previewimage_filename', 'previewimage_description', 'layouts', 'modules', 'folder', 'folder_preview'],
		    proxy: {
		        type: 'ajax',
		       	url: 'cms/templates/read',
		        reader: {
		            type: 'json',
		            successProperty: 'success'
		        }
		    },
		    autoLoad: true,
		    autoSync: false,
		});

		Ext.create('Ext.grid.Panel', {
			id: 'templatesGrid',
		    title: cms.lang.templates.title,
		    border: false,
		    bodyCls: 'content',
		    store: Ext.getStore('templatesStore'),
		    columns: [
		    	{ text: cms.lang.templates.grid.active, xtype: 'templatecolumn', width:50,
		    		tpl: '<tpl if="active"><span class="icon green very-big">&Atilde;</span>'
		    			+ '<tpl else><span class="icon red very-big">&Acirc;</span></tpl>'},
		    	{ text: cms.lang.templates.grid.preview , width: 270, xtype: 'templatecolumn',
		    		tpl: '<p><img src="{folder}/{folder_preview}/{previewimage_filename}" /></p>'
		    			+ '<p class="sans-serif very-small uppercase dark-gray normal-lh">{previewimage_description}</p>'},
		    	{ text: cms.lang.templates.grid.description, flex: 1, xtype: 'templatecolumn',
		    		tpl: '<h2>{name}</h2>'
						+'<p class="justified normal normal-lh">{description}</p>'
						+'<h2>Layouts</h2>'
						+'<ul class="normal normal-lh">'
						+'<tpl for="layouts">'
						+'<li><span class="icon green">&Atilde;</span> {description}</li>'
						+'</tpl>'
						+'</ul>'
						+'<h2>Modules</h2>'
						+'<ul class="normal normal-lh">'
						+'<tpl for="modules">'
						+'<li><span class="icon green">&Atilde;</span> {description}</li>'
						+'</tpl>'
						+'</ul>'
				}
		    ],
		    tbar: [{
		    	text: '<span class="icon very-big">&Ntilde;</span> ' + cms.lang.templates.button.import,
		    	handler: function() {
		    		Ext.Msg.show({
		    			title: cms.lang.templates.message.title,
		    			msg: cms.lang.templates.message.content,
		    			buttons: Ext.Msg.YESNO,
		    			icon: Ext.Msg.WARNING,
		    			fn: function(btn) {
		    				if (btn == 'yes') {
		    					Ext.Ajax.request({
		    						url: 'cms/templates/import',
		    						success: function() {
		    							Ext.MessageBox.alert('Status', cms.lang.templates.message.success);
		    							Ext.getStore('templatesStore').load();
		    						}
		    					});
		    				}
		    			}
		    		});
		    	}
		    },'-',{
		    	text: '<span class="icon very-big">G</span> ' + cms.lang.templates.button.active,
		    	disabled: true,
		    	itemId: 'activateTemplate',
		    	handler: function() {
		    		var selection = Ext.getCmp('templatesGrid').getView().getSelectionModel().getSelection()[0];
		    		Ext.Ajax.request({
		    			url: 'cms/templates/settemplate/' + selection.data.id,
		    			success: function() {
		    				Ext.MessageBox.alert('Status', cms.lang.templates.message2.success + ' <i>' + selection.data.name + '</i>');
		    				Ext.getStore('templatesStore').load();
		    			}
		    		});
		    	}
		    }]
		});
	
		// make "set active" button clickable if a row is selected
		Ext.getCmp('templatesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('templatesGrid').down('#activateTemplate').setDisabled(selections.length === 0);
	    });

	    cms.fillContentPanel(Ext.getCmp('templatesGrid'));
	},
	
	/**
	* Show "set active" button in the template grid, only if the 
	* template is not active currently
	*/
	updateTemplateGridInfo: function(dataId){
		$('p.hidden').hide();
		$('button').show();
		if (dataId != null)
		{
			$('p.hidden[activeid=' + dataId + ']').show();
			$('button[activate=' + dataId + ']').hide();
		}
		else
		{
			$('button[isactive=1]').hide();
			$('p.hidden[isactive=1]').show();
		}
	},
	
	/**
	* Fill the structures grid with data
	*/
	populateStructuresGrid: function() {
		if (this.debug) console.log('populating structures data grid');
		
		Ext.define('Structure', {
			extend: 'Ext.data.Model',
			fields: [
				{name:'id', type:'int'}, 
				{name:'active', type:'bool'}, 
				'position', 'title', 'description', 'user_name',
				{name:'layout_id', type:'int'}
			],
			validation: [
				{type: 'format', field: 'title', matcher: /lolthisdoesntworkatall(TODO)/ }
			]
		});

		Ext.create('Ext.data.Store', {
		    storeId: 'structuresStore',
		    model: 'Structure',
		    lastOperation: '',
		    proxy: {
		        type: 'ajax',
		       	api: {
		       		read: 'cms/structures/read',
		       		create : 'cms/structures/create',
		            update : 'cms/structures/update',
		            destroy : 'cms/structures/destroy'
		       	},
		        reader: {
		            type: 'json',
		            successProperty: 'success'
		        },
		        writer: {
		        	type: 'json'
		        }
		    },
		    autoLoad: true,
		    autoSync: true,
		    listeners: {
		    	load: function() {
		    		// after loading select the first entry to populate the 2nd form panel
		    		Ext.getCmp('categoriesGrid').getSelectionModel().select(0);
		    	},
		    	write: function(store, op) {
		    		// if last operation was "create" and now we have an update,
		    		// we want to reload the store afterwards to get the objects new id
		    		var s = Ext.getStore('structuresStore');
		    		if (s.lastOperation == 'create'
		    			&& op.action == 'update') {
		    			s.load();
		    		}
		    		
		    		s.lastOperation = op.action;
		    	}
		    }
		});

		// load layouts of current template
		Ext.create('Ext.data.Store', {
			storeId: 'layoutsStore',
			fields: ['id', 'template_id', 'name', 'description', 'view', 'columns'],
			proxy: { 
				type: 'ajax',
				url: 'cms/layouts/read',
				reader: { 
					type: 'json',
					successProperty: 'success' 
				},
			},
			autoLoad: false
		});
		Ext.getStore('layoutsStore').load(); // have to load manually, else the combobox bugs

		// load modules of current template
		Ext.create('Ext.data.Store', {
			storeId: 'modulesStore',
			fields: ['id', 'template_id', 'name', 'description', 'view'],
			proxy: {
				type: 'ajax',
				url: 'cms/modules/read',
				reader: {
					type: 'json',
					successProperty: 'success'
				}
			},
			autoLoad: false
		});
		Ext.getStore('modulesStore').load();

		// define column mapping store
		Ext.create('Ext.data.Store', {
			storeId: 'columnMappingStore',
			fields: ['id', 'structure_id', 'column', 'module_id'],
			proxy: {
				type: 'ajax',
				url: 'cms/structurecolumnmappings/read',
				reader: {
					type: 'json'
				}
			},
			autoLoad: false
		});
		Ext.getStore('columnMappingStore').load();

		var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
	        clicksToMoveEditor: 1,
	        autoCancel: false
	    });

		//create outer formpanel
		Ext.create('Ext.form.Panel', {
			id: 'structuresForm',
			title: cms.lang.structures.title,
			layout: 'column',
			bodyCls: 'content',
			border: false,
			items: [
			// left gridpanel
			{
				columnWidth: 0.60,
				height: Ext.getCmp('navmenu').getHeight(),
				xtype: 'gridpanel',
				id: 'categoriesGrid',
				title: cms.lang.structures.grid.title,
				plugins: [rowEditing],
				store: Ext.getStore('structuresStore'),
				columns: [
			        { text: '#',  dataIndex: 'position', width:30, editor:{ allowBlank:false }},
			        { text: cms.lang.structures.grid.active, dataIndex: 'active', width: 50, xtype: 'checkcolumn',
			        	editor: {xtype: 'checkbox', cls: 'x-grid-checkheader-editor'}
			       	},
			        { text: cms.lang.structures.grid.titleCol, dataIndex: 'title', editor:{ allowBlank:false } },
			        { text: cms.lang.structures.grid.description, dataIndex: 'description', flex: 1, editor:{ allowBlank:true } },
			        { text: cms.lang.structures.grid.user, dataIndex: 'user_name', width: 60}
			    ],
			    tbar: [{
			    	text: '<span class="icon very-big">@</span> ' + cms.lang.structures.button.add,
			    	handler: function() {
			    		rowEditing.cancelEdit();
			    		Ext.getStore('structuresStore').insert(0,new Structure());
			    		rowEditing.startEdit(0,0);
			    	}
			    },'-',{
			    	text: '<span class="icon very-big">A</span> ' + cms.lang.structures.button.remove,
			    	itemId: 'deleteCategory',
			    	handler: function() {
			    		Ext.Msg.show({
			    			title: cms.lang.structures.message.title,
			    			msg: cms.lang.structures.message.content,
			    			buttons: Ext.Msg.YESNO,
			    			icon: Ext.Msg.WARNING,
			    			fn: function(btn) {
			    				if (btn == 'yes') {
			    					var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
						    		Ext.getStore('structuresStore').remove(selection);
						    		// finally select 1st entry again
						    		Ext.getCmp('categoriesGrid').getSelectionModel().select(0);
			    				}
			    			}
			    		});
			    	}
			    }],
			    listeners: {
	                selectionchange: function(model, records) {
	                    // link to formpanel on selection
	                    if (records[0]) {
	                       	var layout_id = records[0].data.layout_id;
	                       	var s = Ext.getStore('layoutsStore');
	                       	var i = s.find('id', layout_id);
	                       	
	                       	// if a layout record is found in the store we
	                       	// get the data and fill the layout combobox
	                       	if (i != -1) {
	                       		var rec = s.getAt(i);	
	                       		Ext.getCmp('layoutsComboBox').setValue(rec.data.description);

	                       		// also paint the corresponding number of module comboboxes
	                       		cms.paintModuleSelectionBoxes(rec.data.columns);
	                       	}
	                       	else {
	                       		var c = Ext.getCmp('layoutsComboBox');
	                       		c.setValue('Choose layout...');
	                       		cms.paintModuleSelectionBoxes(0);
	                       	}
	                       		
	                    }
	                }
	            }
			},
			// right formpanel
			{
				id: 'layoutModuleFormPanel',
				columnWidth: 0.4,
	            margin: '0 0 0 10',
	            xtype: 'fieldset',
	            title: cms.lang.structures.form.title,
	            defaultType: 'combo',
	            defaults: {
	                width: 300,
	                labelWidth: 90
	            },
				items:[{
					fieldLabel: cms.lang.structures.form.layout,
					id: 'layoutsComboBox',
					store: Ext.getStore('layoutsStore'),
					emptyText: cms.lang.structures.form.emptyText,
					displayField: 'description',
					valueField: 'id',
					queryMode: 'local',
					listeners: {
						change: function(cmp, newValue, oldValue) {
							// save if new value is numeric
							if (Ext.isNumeric(newValue)) {
								var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
						    	selection.set('layout_id', newValue);

						    	// also repaint the column boxes
						    	var s = Ext.getStore('layoutsStore');
	                       		var i = s.find('id', newValue);
	                       		var rec = s.getAt(i);
						    	cms.paintModuleSelectionBoxes(rec.data.columns);
							}
						}
					}
				}]
			}]
		});
		
		cms.fillContentPanel(Ext.getCmp('structuresForm'));
	},

	/*
	* Helper method to add comboboxes to the layout & modules formpanel
	*/
	paintModuleSelectionBoxes: function(columns) {
		var cmp = Ext.getCmp('layoutModuleFormPanel');

		// remove all older module comboboxes
		for (var i = 0; i < cmp.items.items.length; i++) {
			var id = cmp.items.items[i].id;
			if (id != 'layoutsComboBox') {
				cmp.remove(id, true);
				cmp.doLayout();
				i--; // size of array changes with removal -> hence the addressing
			}
		}
		
		// add new module comboboxes
		for (var i = 0; i < columns; i++) {
			cmp.add({
				fieldLabel: cms.lang.structures.form.column + ' ' + (i+1) + ' ' + cms.lang.structures.form.module,
				id: 'moduleComboBoxColumn' + i,
				store: Ext.getStore('modulesStore'),
				emptyText: 'Choose module...',
				displayField: 'description',
				valueField: 'id',
				queryMode: 'local',
				listeners: {
					change: function(cmp, newValue, oldValue) {
						// save if new value is numeric
						if (Ext.isNumeric(newValue)) {
							var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];

					    	Ext.Ajax.request({
					    		url: 'cms/structurecolumnmappings/update',
					    		params: {
					    			structure_id: selection.data.id,
					    			column: cmp.id.slice(20,cmp.id.length),
					    			module_id: newValue
					    		},
					    		success: function() {
					    			// load mapping data again for correct lookup on later changes
					    			Ext.getStore('columnMappingStore').load();
					    		}
					    	});
						}
					}
				}
			});

			// if a module was selected before, set the value
			var structure_id = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0].data.id;
			var q = Ext.getStore('columnMappingStore').query('structure_id', structure_id);
			for (var j=0; j < q.items.length; j++) {
				var data = q.items[j].data;
				if (data.column == i) {
					var index = Ext.getStore('modulesStore').find('id', data.module_id);
					var d = Ext.getStore('modulesStore').getAt(index).data.description;
					Ext.getCmp('moduleComboBoxColumn' + i).setValue(d);
				}
			}
		}
	},

	/*
	* Fill the articles grid with data
	*
	* cssdata: array containing objects with paths to used css files e.g. [{path:'../styles.css'}]
	*/
	prepareArticlesPanel: function(cssdata) {
		if (this.debug) console.log('populating articles treeview');

		// bugfix: manually destroy the tinyMCE editor object if it exists, else
		// the article editing page cannot be created a second time because of dom errors
		if (typeof Ext.getCmp('articleFieldContent') != 'undefined')
			Ext.getCmp('articleFieldContent').destroy();

		// begin loading image data
		Ext.create('Ext.data.Store', {
			storeId: 'imageStore',
			fields: ['id', 'description', 'link', 'thumb', 'filename'],
			proxy: {
				type: 'ajax',
				url: 'cms/file/images',
				reader: {
					type: 'json'
				}
			},
			autoLoad: true
		});

		// begin loading document data
		Ext.create('Ext.data.Store', {
			storeId: 'documentStore',
			fields: ['id', 'description', 'filename', 'link'],
			proxy: {
				type: 'ajax',
				url: 'cms/file/documents',
				reader: {
					type: 'json'
				}
			},
			autoLoad: true
		});

		// define a new model, because the standard treeview model does not contain the mapping_id field
		Ext.define('ArticleNode', {
			extend: 'Ext.data.Model',
			fields: ['mapping_id', 'id', 'text'],
			proxy: {
				type: 'localstorage'
			}
		});

		Ext.Ajax.request({
			url: 'cms/articles/treeview',

			success: function(response) {
				var storeConfig = Ext.JSON.decode(response.responseText);
				storeConfig.model = 'ArticleNode'; // add custom model reference
				var treeStore = Ext.create('Ext.data.TreeStore', storeConfig);
				
				cms.paintArticlesPanel(treeStore, cssdata);
			}
		});
	},
	/*
	* After loading the prepared tree store data for the articles panel,
	* it can be added to the DOM
	*/
	paintArticlesPanel: function(treeStore, cssdata) {
		Ext.create('Ext.panel.Panel', {
			id: 'articlesParentPanel',
			title: cms.lang.articles.title,
			bodyCls: 'content',
			border: false,
			layout: 'column',
			listeners: {
				afterrender: function(self) {
					// bugfix for height rendering error of tinymce extjs wrapper
					Ext.getCmp('articlesTreePanel').expandAll();
					Ext.getCmp('articlesTreePanel').collapseAll();
				}
			},
			items: [{
				columnWidth: 0.31,
				height: Ext.getCmp('navmenu').getHeight() - 25,
				xtype: 'treepanel',
				id: 'articlesTreePanel',
				title: cms.lang.articles.grid.title,
				store: treeStore,
				rootVisible: false,
				viewConfig: {
					plugins: { ptype: 'treeviewdragdrop' }
				},
				tbar: [ { 
					xtype: 'button', 
					id: 'addArticleBtn',
					text: '<span class="icon very-big">@</span>&nbsp;' + cms.lang.articles.button.add, 
					disabled: true,
					handler: function(self, e) {
						if (cms.debug) console.log('add article button pressed');
						cms.addArticle();
					}
				},'-',{ 
					xtype: 'button', 
					id: 'saveArticleBtn',
					text: '<span class="icon very-big">&Atilde;</span>&nbsp;' + cms.lang.articles.button.save, 
					disabled: true,
					handler: function(self, e) {
						if (cms.debug) console.log('save article button pressed');
						cms.saveArticle();
					} 
				},'-',{ 
					xtype: 'button', 
					id: 'deleteArticleBtn',
					text: '<span class="icon very-big">&Acirc;</span>&nbsp;' + cms.lang.articles.button.delete, 
					disabled: true,
					handler: function(self, e) {
						if (cms.debug) console.log('delete article button pressed');
						cms.deleteArticle();
					}
				}],
				listeners: {
					select: function(self, record, index) {
						// first check, if the user is leaving a currently edited article
						cms.leaveArticle(record, Ext.getCmp('articlesEditPanel').record);

						// disable all buttons after click
						var buttonIDs = ['addArticleBtn', 'saveArticleBtn', 'deleteArticleBtn'];
						Ext.each(buttonIDs, function(id){
							Ext.getCmp(id).disable(true);
						});
						
						// on a column field we want to enable adding articles
						// remember: columns are on 2nd level and not leafes
						if (record.parentNode.parentNode != null && !record.data.leaf) {
							Ext.getCmp('addArticleBtn').enable(true);
						}
						
						// leafes can be deleted for now
						if (record.data.leaf) {
							Ext.getCmp('deleteArticleBtn').enable(true);
							Ext.getCmp('saveArticleBtn').disable(true);
						}						
					},

					// handling a (via drag&drop) moved item
					itemmove: function(node, oldParent, newParent, index, eopts) {
						if (newParent != oldParent) {
							Ext.Ajax.request({
								url: 'cms/articles/changemapping/' + node.data.id,
								params: { mapping_id: newParent.data.mapping_id },
								failure: function(response) {
									Ext.MessageBox.alert('Error', cms.lang.articles.message.error + ' (Error code ' + response.status + ').');
								}
							});
						}
					}
				}
			},{
				columnWidth: 0.69,
				xtype: 'fieldset',
				id: 'articlesEditPanel',
				title: cms.lang.articles.form.title,
				margin: '0 0 0 10',
				defaultType: 'textfield',
				record: null,
				initialDataChange: true,	// helper attribute to identify if data was loaded or really changed by user
				initialTitle: '',			// helper attribute to remember the article title before it was edited
				disabled: true,
	            defaults: {
	                width: 300,
	                labelWidth: 70,
	                labelAlign: 'top',
	                margin: '0 0 10 0'
	            },
				items: [{
					fieldLabel: cms.lang.articles.form.active,
					xtype: 'checkbox',
					id: 'articleFieldActive',
					labelAlign: 'left',
					listeners: {
						change: function(self, newValue, oldValue) { 
							var editPanel = Ext.getCmp('articlesEditPanel');
							if (!editPanel.initialDataChange) {
								Ext.getCmp('saveArticleBtn').enable(true); 
								// mark record as dirty
								editPanel.record.setDirty();
							}
						}
					}
				},{
					fieldLabel: cms.lang.articles.form.titleLable,
					id: 'articleFieldTitle',
					listeners: {
						change: function(self, newValue, oldValue) { 
							var editPanel = Ext.getCmp('articlesEditPanel');
							//var record = Ext.getCmp('articlesEditPanel').record;
							if (!editPanel.initialDataChange) {
								Ext.getCmp('saveArticleBtn').enable(true); 
								// mark record as dirty
								editPanel.record.setDirty();
								// update treepanel title
								if (editPanel.record != null) {
									editPanel.record.data.text = newValue;
									editPanel.record.set('title', newValue); // used to update the treepanel -.-
								}
							}
						}
					}
				},{
					fieldLabel: cms.lang.articles.form.description,
					xtype: 'textareafield',
					id: 'articleFieldDescription',
					width: 580,
					height: 70,
					listeners: {
						change: function(self, newValue, oldValue) { 
							var editPanel = Ext.getCmp('articlesEditPanel');
							if (!editPanel.initialDataChange) {
								Ext.getCmp('saveArticleBtn').enable(true); 
								// mark record as dirty
								editPanel.record.setDirty();
							}
						}
					}
				},{
					fieldLabel: cms.lang.articles.form.article,
					xtype: 'tinymce_textarea',
					id: 'articleFieldContent',
					width: 580,
					height: cms.calculateEditArticleHeight(),
					resizable: false, //true
					tinyMCEConfig: {
						theme_advanced_row_height: 27,
                        delta_height: 0,
                        schema: 'html5',
                        plugins : "autolink,lists,pagebreak,style,table,advhr,advlink,iespell,inlinepopups,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,sub,sup,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect', //styleselect,fontselect,fontsizeselect
                        theme_advanced_buttons2 : 'table,|,bullist,numlist,|,blockquote,hr,|,search,replace,|,link,unlink,|,wbimage,wbdocument,|,code,preview,fullscreen',
                        content_css: ((cssdata.length > 0) ? cssdata[0].path : null), //TODO: add more than one css file
                        theme_advanced_containers_default_align : 'left',
                        setup: function(editor) {
                        	// Add a custom image button
                        	editor.addButton('wbimage', {
                        		title: cms.lang.articles.form.image,
                        		image: 'assets/images/icons_48x48/Picture.png',
                        		onclick: function() {
                        			Ext.create('Ext.window.Window', {
									    id: 'selectImageWindow',
									    title: cms.lang.articles.window.title,
									    width: 500,
									    
									    items: [{
									    	xtype: 'dataview',
									    	id: 'selectImageDataView',
									    	store: Ext.getStore('imageStore'),
									    	tpl: Ext.create('Ext.XTemplate',
									    		'<tpl for=".">',
									    		'<div class="imageselect">',
									    		'<img src="{thumb}" />',
									    		'<p><span class="small light-blue">{shortFilename}</span>',
									    		'<br/><span class="small dark-gray">{shortDescription}</span></p>',
									    		'</div>',
									    		'</tpl>',
									    		'<div class="x-clear"></div>'
									    	),
									    	itemSelector: 'div.imageselect',
									    	selectedItemCls: 'imageselect-hover',
									    	trackOver: true,
									    	overItemCls: 'x-item-over',
									    	emptyText: 'No images available',
									    	multiselect: false,
									    	autoScroll: true,
									    	maxHeight: 450,
									    	prepareData: function(data) {
									    		Ext.apply(data, {
									    			shortFilename: Ext.util.Format.ellipsis(data.filename, 15),
									    			shortDescription: Ext.util.Format.ellipsis(data.description, 32)
									    		});
									    		return data;
									    	}
									    }],

									    buttons: [{
									    	text: cms.lang.articles.window.select,
									    	handler: function() {
									    		var records = Ext.getCmp('selectImageDataView').getSelectionModel().getSelection();
									    		if (records.length === 0) {
									    			Ext.MessageBox.alert(cms.lang.articles.message6.title, cms.lang.articles.message6.error);
									    		}
									    		else {
									    			var record = records[0];
									    			editor.focus();
										    		editor.selection.setContent('<img src="' + record.data('link') + '" alt="' + record.get('description') + '"/>');
										    		Ext.getCmp('selectImageWindow').close();
									    		}
									    	}
									    },{
									    	text: cms.lang.articles.window.cancel,
									    	handler: function() {
									    		Ext.getCmp('selectImageWindow').close();
									    	}
									    }]
									}).show();
                        		}
                        	});
							
							// add a custom pdf document button
							editor.addButton('wbdocument', {
								title: cms.lang.articles.form.document,
								image: 'assets/images/pdf.jpg',
								onclick: function() {
									Ext.create('Ext.window.Window', {
										id: 'selectDocumentWindow',
										title: cms.lang.articles.window2.title,
										width: 600,
										//height: 200,

										items: [{
											xtype: 'gridpanel',
											id: 'selectDocumentGrid',
											store: Ext.getStore('documentStore'),
											//width: 400,
											height: 250,
											border: false,
		    								columns: [
		    									{ text: cms.lang.articles.window2.name, dataIndex: 'filename', width: 180 },
		    									{ text: cms.lang.articles.window2.description, dataIndex: 'description', flex: 1 },
		    								]
										}],

										buttons: [{
											text: cms.lang.articles.window2.select,
											handler: function() {
												var record = Ext.getCmp('selectDocumentGrid').getSelectionModel().getSelection()[0];
												editor.focus();
												editor.selection.setContent('<a href="' + record.get('link') + '" target="_blank">' + cms.lang.articles.window2.link + '</a>');
												Ext.getCmp('selectDocumentWindow').close();
											}
										},{
											text: cms.lang.articles.window2.cancel,
											handler: function() {
												Ext.getCmp('selectDocumentWindow').close();
											}
										}]
									}).show();
								}
							});						
                        }
					},
					listeners: {
						change: function() { 
							var editPanel = Ext.getCmp('articlesEditPanel');
							if (!editPanel.initialDataChange) {
								Ext.getCmp('saveArticleBtn').enable(true); 
								// mark record as dirty
								editPanel.record.setDirty();
							}
						}
					}
				}]
			}]
		});

		cms.fillContentPanel(Ext.getCmp('articlesParentPanel'));	
	},

	/**
	 * Helper method to calculate the optimum height of the editor textarea
	 */
	calculateEditArticleHeight: function() {
		var bestHeight = Ext.getCmp('navmenu').getHeight() - 261;
		return ((bestHeight < 350) ? 350 : bestHeight);
	},

	updateArticlesPanel: function() {
		// load leaf data
		Ext.Ajax.request({
			url: 'cms/articles/read/' + Ext.getCmp('articlesEditPanel').record.data.id,

			success: function(response) {
				var editPanel = Ext.getCmp('articlesEditPanel');
				var data = Ext.JSON.decode(response.responseText);

				editPanel.initialDataChange = true;
				editPanel.initialTitle = data.title; // remember initial title for later treeview resetting
				
				Ext.getCmp('articleFieldActive').setValue(data.active);
				Ext.getCmp('articleFieldTitle').setValue(data.title);
				Ext.getCmp('articleFieldDescription').setValue(data.description);
				Ext.getCmp('articleFieldContent').setValue(data.content);

				editPanel.initialDataChange = false;
				editPanel.enable();
			},
			failure: function(response, opts) {
				Ext.MessageBox.alert('Error',  cms.lang.articles.message2.error + ' (Error code ' + response.status + ').');
			}
		});
	},

	saveArticle: function() {
		tinymce.triggerSave(); 	// has to be done, because tinymce is an addon and the underlying 
								// form field needs to be updated
		var request = {};
		request.active = Ext.getCmp('articleFieldActive').getValue();
		request.title = Ext.getCmp('articleFieldTitle').getValue();
		request.description = Ext.getCmp('articleFieldDescription').getValue();
		request.content = Ext.getCmp('articleFieldContent').getValue();
		
		Ext.Ajax.request({
			url: 'cms/articles/update/'+ Ext.getCmp('articlesEditPanel').record.data.id,
			params: request, 

			success: function(response) {
				Ext.MessageBox.alert('Status', cms.lang.articles.message3.success);
				Ext.getCmp('articlesEditPanel').record.save(); //remove the dirty flag
			},
			failure: function(response, opts) {
				Ext.MessageBox.alert('Error', cms.lang.articles.message3.error + ' (Error code ' + response.status + ').');
			}
		});
	},

	deleteArticle: function() {
		Ext.Msg.show({
			title: cms.lang.articles.message4.title,
			msg: cms.lang.articles.message4.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.QUESTION,
			fn: function(btn) {
				if (btn == 'yes') {
					Ext.Ajax.request({
						url: 'cms/articles/destroy/' + Ext.getCmp('articlesEditPanel').record.data.id,
						success: function(response) {
							var node = Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
							node.remove();
						},
						failure: function(response, opts) {
							Ext.MessageBox.alert('Error', cms.lang.articles.message4.error + ' (Error code ' + response.status + ').');
						}
					});
				}
			}
		});
	},

	addArticle: function() {
		var node = Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
		
		Ext.Ajax.request({
			url: 'cms/articles/create',
			params: { mapping_id : node.data.mapping_id },

			success: function(response) {
				var r = Ext.JSON.decode(response.responseText);
				var id = r.id;
				
				var newNode = node.createNode({id: r.id, text: 'new title', leaf: true});
				node.appendChild(newNode);
			},
			failure: function(response) {
				Ext.MessageBox.alert('Error', cms.lang.articles.message5.error + ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	*	Helper method to process a context change of the treepanel
	*	(clicking another article or whatever)
	*/
	leaveArticle: function(newRecord, oldRecord) {
		// check if the current record should be saved first ?
		if (oldRecord != null && oldRecord.dirty) {	
			Ext.Msg.show({
				title: 'Save changes?',
				msg: 'The current articles data has been changed. Save changes before proceeding?',
				buttons: Ext.Msg.YESNO,
				icon: Ext.Msg.QUESTION,
				fn: function(btn) {
					// save if yes is pressed
					if (btn == 'yes')
						cms.saveArticle();
					// restore the old title in the treeview if 'no' is pressed
					else {
						var title = Ext.getCmp('articlesEditPanel').initialTitle;
						oldRecord.data.text = title;
						oldRecord.set('title', title);
					}

					// anyways we save the treepanel record for now to indicate the non-dirty state
					oldRecord.save();
					// disable the edit panel for now if we are changing focus
					Ext.getCmp('articlesEditPanel').disable();
					// load new data into the articles panel if appropriate
					if (newRecord.data.leaf) {
						// remember the currently clicked record id in the edit panel as hidden value
						Ext.getCmp('articlesEditPanel').record = newRecord;
						cms.updateArticlesPanel();
					}
				}
			});
		}
		else {
			Ext.getCmp('articlesEditPanel').disable();
			
			if (newRecord != null && newRecord.data.leaf) {
				Ext.getCmp('articlesEditPanel').record = newRecord;
				cms.updateArticlesPanel();
			}
		}		
	},

	/**
	*	Manages the grid that is responsible for the file management
	*/
	populateFilesGrid: function() {
		if (this.debug) console.log('populating files grid');
		
		Ext.define('File', {
			extend: 'Ext.data.Model',
			fields: [
				{name:'id', type:'int'}, 
				{name:'active', type:'bool'}, 
				'user_id', 'filename', 'type', 'description', 'link',
				{name:'creationdate', type:'date'}
			]
		});

		Ext.create('Ext.data.Store', {
		    storeId: 'filesStore',
		    model: 'File',
		    lastOperation: '',
		    proxy: {
		        type: 'ajax',
		       	api: {
		       		read: 'cms/filemanager/read',
		       		create : 'cms/filemanager/create',
		            update : 'cms/filemanager/update',
		            destroy : 'cms/filemanager/destroy'
		       	},
		        reader: {
		            type: 'json',
		            successProperty: 'success'
		        },
		        writer: {
		        	type: 'json'
		        }
		    },
		    autoLoad: true,
		    autoSync: true,
		    listeners: {
		    	load: function() {
		    		// after loading select the first entry to populate the 2nd form panel
		    		//Ext.getCmp('filesGrid').getSelectionModel().select(0);
		    	},
		    	write: function(store, op) {
		    		// if last operation was "create" and now we have an update,
		    		// we want to reload the store afterwards to get the objects new id
		    		var s = Ext.getStore('filesStore');
		    		if (s.lastOperation == 'create'
		    			&& op.action == 'update') {
		    			s.load();
		    		}
		    		
		    		s.lastOperation = op.action;
		    	}
		    }
		});

		var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
	        clicksToMoveEditor: 1,
	        autoCancel: false
	    });

		var previewTpl = new Ext.XTemplate(
			'<tpl if="this.isImage(type)">',
		    '<img src="{link}" />',
		    '<tpl else>',
		    '<a href="{link}" target="_blank" style="text-decoration:none; border-bottom:1px dotted; color:#0c3546;">',
		    '<span class="icon very-big">E</span> '+cms.lang.filemanager.tpl.openfile+'</a>',
		    '</tpl>',
		    {
		    	isImage: function(type) {
		    		return (type.indexOf('image') !== -1);
		    	}
		    }
		);

		Ext.create('Ext.grid.Panel', {
			id: 'filesGrid',
		    title: cms.lang.filemanager.title,
		    bodyCls: 'content',
		    border: false,
		    store: Ext.getStore('filesStore'),
		    plugins: [rowEditing],
		 	columns: [
		   			{ text: cms.lang.filemanager.grid.active, dataIndex: 'active', width: 50, xtype: 'checkcolumn',
			        	editor: {xtype: 'checkbox', cls: 'x-grid-checkheader-editor'}
			       	},
			        { text: cms.lang.filemanager.grid.creation, dataIndex: 'creationdate', xtype:'datecolumn', format: 'd.m.Y',
			    		editor: {allowBlank:false, xtype:'datefield', format: 'd.m.Y'} },
			        { text: cms.lang.filemanager.grid.user, dataIndex: 'user_id' },
			        { text: cms.lang.filemanager.grid.name, dataIndex: 'filename', width: 120 },
			        { text: cms.lang.filemanager.grid.type, dataIndex: 'type', width: 90 },
			        { text: cms.lang.filemanager.grid.description, dataIndex: 'description', flex: 1, editor:{ allowBlank:true } },
			        { text: cms.lang.filemanager.grid.preview, xtype: 'templatecolumn', width: 90, tpl: previewTpl }
			],
		    tbar: [{
		    	text: '<span class="icon very-big">n</span> ' + cms.lang.filemanager.button.upload,
		    	handler: function() {
		    		Ext.create('Ext.window.Window', {
					    id: 'uploadWindow',
					    title: cms.lang.filemanager.window.title,
					    width: 500,
					    
					    items: [{
					    	xtype: 'form',
					    	id: 'file-form',
					    	border: false,
					    	bodyCls: 'content-extjs',
					    	margin: 10,
					    	defaults: {
						    	anchor: '100%',
						    	allowBlank: false,
						    	msgTarget: 'side',
						    	labelWidth: 75
						    },
						    items: [{  
						    	xtype: 'textfield',
						    	name: 'form-description',
						    	fieldLabel: cms.lang.filemanager.window.description
						    },{
						    	xtype: 'filefield',
						    	id: 'form-file',
						    	emptyText: cms.lang.filemanager.window.emptyText,
						    	fieldLabel: cms.lang.filemanager.window.file,
						    	buttonText: '<span class="icon very-big">&Oslash;</span>'
					    	}]
					    }],

					    buttons: [{
					    	text: cms.lang.filemanager.window.save,
					    	handler: function() {
					    		var form = Ext.getCmp('file-form').getForm();
					    		if(form.isValid()){
					    			form.submit({
					    				url: 'cms/filemanager/create',
					    				waitMsg: 'Uploading file...',
					    				success: function(fp, o) {
					    					Ext.getCmp('uploadWindow').close();
					    					Ext.getStore('filesStore').reload();
					    				}
					    			});
					    		}
					    	}
					    },{
					    	text: cms.lang.filemanager.window.reset,
					    	handler: function() {
					    		Ext.getCmp('file-form').getForm().reset();
					    	}
					    }]
					}).show();
		    	}
		    },'-',{
		    	text: '<span class="icon very-big">m</span> ' + cms.lang.filemanager.button.delete,
		    	disabled: true,
		    	itemId: 'deleteFile',
		    	handler: function() {
		    		Ext.Msg.show({
		    			title: cms.lang.filemanager.message.title,
		    			msg: cms.lang.filemanager.message.content,
		    			buttons: Ext.Msg.YESNO,
		    			icon: Ext.Msg.WARNING,
		    			fn: function(btn) {
		    				if (btn == 'yes') {
		    					var record = Ext.getCmp('filesGrid').getSelectionModel().getSelection()[0];
		    					Ext.getStore('filesStore').remove(record);
		    				}
		    			}
		    		});
		    	}
		    }]
		});
	
		// make "delete file" button clickable if a row is selected
		Ext.getCmp('filesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('filesGrid').down('#deleteFile').setDisabled(selections.length === 0);
	    });
		
		cms.fillContentPanel(Ext.getCmp('filesGrid'));
	},

	populateUsersGrid: function() {
		if (this.debug) console.log('populating users grid');

		Ext.define('User', {
			extend: 'Ext.data.Model',
			fields: [
				{name:'id', type:'int'}, 
				{name:'email', type:'string'}, 
				{name:'username', type:'string'},
				{name:'logins', type:'int'}, 
				{name:'last_login', type:'date'}
			]
		});

		Ext.create('Ext.data.Store', {
		    storeId: 'usersStore',
		    model: 'User',
		    proxy: {
		        type: 'ajax',
		       	api: {
		       		read: 'cms/user/read',
		       		create : 'cms/read/create',
		            update : 'cms/read/update',
		            destroy : 'cms/read/destroy'
		       	},
		        reader: {
		            type: 'json',
		            successProperty: 'success'
		        },
		        writer: {
		        	type: 'json'
		        }
		    },
		    lastOperation: '',
		    autoLoad: true,
		    autoSync: true,
		    listeners: {
		    	load: function() {
		    		// after loading select the first entry to populate the 2nd form panel
		    		//Ext.getCmp('filesGrid').getSelectionModel().select(0);
		    	},
		    	write: function(store, op) {
		    		// if last operation was "create" and now we have an update,
		    		// we want to reload the store afterwards to get the objects new id
		    		var s = Ext.getStore('usersStore');
		    		if (s.lastOperation == 'create'
		    			&& op.action == 'update') {
		    			s.load();
		    		}
		    		
		    		s.lastOperation = op.action;
		    	}
		    }
		});

		var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
	        clicksToMoveEditor: 1,
	        autoCancel: false
	    });

		var previewTpl = new Ext.XTemplate(
			'<tpl if="this.isImage(type)">',
		    '<img src="{link}" />',
		    '<tpl else>',
		    '<a href="{link}" target="_blank" style="text-decoration:none; border-bottom:1px dotted; color:#0c3546;">',
		    '<span class="icon very-big">E</span> ' + cms.lang.filemanager.tpl.openfile + '</a>',
		    '</tpl>',
		    {
		    	isImage: function(type) {
		    		return (type.indexOf('image') !== -1);
		    	}
		    }
		);

		Ext.create('Ext.grid.Panel', {
			id: 'usersGrid',
		    title: cms.lang.user.title,
		    bodyCls: 'content',
		    border: false,
		    store: Ext.getStore('usersStore'),
		    plugins: [rowEditing],
		 	columns: [
		   			{ text: cms.lang.user.grid.name, dataIndex: 'username', width: 150, editor:{ allowBlank:false } },
		   			{ text: cms.lang.user.grid.email, dataIndex: 'email', flex: 1, editor:{ allowBlank:false } },
		   			{ text: cms.lang.user.grid.logins, dataIndex: 'logins', width: 80 },
		   			{ text: cms.lang.user.grid.lastlogin, dataIndex: 'last_login', xtype:'datecolumn', format: 'd.m.Y' }
			],
		    tbar: [{
		    	text: '<span class="icon very-big">K</span> ' + cms.lang.user.button.add,
		    	handler: function() {
		    		Ext.create('Ext.window.Window', {
					    id: 'newUserWindow',
					    title: cms.lang.user.window.title,
					    width: 500,
					    
					    items: [{
					    	xtype: 'form',
					    	id: 'user-form',
					    	border: false,
					    	bodyCls: 'content',
					    	margin: 10,
					    	defaults: {
						    	anchor: '100%',
						    	allowBlank: false,
						    	msgTarget: 'side',
						    	labelWidth: 75
						    },
						    items: [{  
						    	xtype: 'textfield',
						    	name: 'username',
						    	fieldLabel: cms.lang.user.window.name
						    },{
						    	xtype: 'textfield',
						    	name: 'email',
						    	fieldLabel: cms.lang.user.window.email
					    	}]
					    }],

					    buttons: [{
					    	text: cms.lang.user.window.save,
					    	handler: function() {
					    		var form = Ext.getCmp('user-form').getForm();
					    		if(form.isValid()){
					    			form.submit({
					    				url: 'cms/user/create',
					    				waitMsg: cms.lang.user.button.waitMsg,
					    				success: function(fp, o) {
					    					Ext.getCmp('newUserWindow').close();
					    					Ext.getStore('usersStore').reload();
					    				}
					    			});
					    		}
					    	}
					    },{
					    	text: cms.lang.user.window.reset,
					    	handler: function() {
					    		Ext.getCmp('file-form').getForm().reset();
					    	}
					    }]
					}).show();
		    	}
		    },'-',{
		    	text: '<span class="icon very-big">L</span> ' + cms.lang.user.button.delete,
		    	disabled: true,
		    	itemId: 'deleteUser',
		    	handler: function() {
		    		Ext.Msg.show({
		    			title: cms.lang.user.message.title,
		    			msg: cms.lang.user.message.content,
		    			buttons: Ext.Msg.YESNO,
		    			icon: Ext.Msg.WARNING,
		    			fn: function(btn) {
		    				if (btn == 'yes') {
		    					var record = Ext.getCmp('usersGrid').getSelectionModel().getSelection()[0];
		    					Ext.getStore('usersStore').remove(record);
		    				}
		    			}
		    		});
		    	}
		    },'-',{
		    	text: '<span class="icon very-big">w</span> ' + cms.lang.user.button.reset,
		    	disabled: true,
		    	itemId: 'resetPassword',
		    	handler: function() {
		    		console.log('TODO: reset pw to newly generated one and send email to user!');
		    	}
		    }]
		});
	
		// make "delete file" button clickable if a row is selected
		Ext.getCmp('usersGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        // at least one user has to stay in the system
	        Ext.getCmp('usersGrid').down('#deleteUser').setDisabled(selections.length === 0 
	        	|| Ext.getStore('usersStore').count() === 1);
	        Ext.getCmp('usersGrid').down('#resetPassword').setDisabled(selections.length === 0);
	    });
		
		cms.fillContentPanel(Ext.getCmp('usersGrid'));
	},

	populateSystemPanel: function() {
		if (this.debug) console.log('populating system panel');

		Ext.define('Language', {
			extend: 'Ext.data.Model',
			fields: [
				{name:'id', type:'int'}, 
				{name:'name', type:'string'}, 
				{name:'shortform', type:'string'}
			]
		});

		Ext.create('Ext.data.Store', {
		    storeId: 'languagesStore',
		    model: 'Language',
		    proxy: {
		        type: 'ajax',
		        url: 'cms/system/languages',
		        reader: {
		            type: 'json',
		            successProperty: 'success'
		        }
		    },
		    autoLoad: true
		});

		var systemForm = Ext.widget({
			xtype: 'form',
			id: 'systemForm',
			url: 'cms/system',
			title: cms.lang.system.title,
			bodyCls: 'content',
			bodyPadding: 15,
			border: false,
			fieldDefaults: {
				msgTarget: 'side',
				labelWidth: 150,
				margin: '0 0 20px 0'
			},
			
			tbar: [{
				text:'<span class="icon very-big">&Ntilde;</span> ' + cms.lang.system.button.save,
				handler: function() {
					var field = Ext.getCmp('systemFormEmail');
					if (field.validate()) {
						Ext.Ajax.request({
							url: 'cms/system/update',
							params: {
								email: field.getValue(),
								language: Ext.getCmp('languageComboBox').getValue()
							},
							success: function(response) {
								Ext.MessageBox.alert('Status', '<p>' + cms.lang.system.message.success1 + '</p>'
									+ '<p>' + cms.lang.system.message.success2 + '</p>');
							},
							failure: function(response) {
								Ext.MessageBox.alert('Error', cms.lang.system.message.error + ' (Error code ' + response.status + ').');
							}
						});
					}
				}
			}],
			
			items: [{
				xtype: 'fieldset',
				title: cms.lang.system.form.title,
				defaultType: 'textfield',
				defaults: {
					width:400
				},
				items: [{
					fieldLabel : cms.lang.system.form.contactemail,
					name: 'email',
					allowBlank: false,
					vtype: 'email',
					id: 'systemFormEmail'
				},{
					name: 'language',
					xtype: 'combobox',
					fieldLabel: cms.lang.system.form.language,
					id: 'languageComboBox',
					store: Ext.getStore('languagesStore'),
					emptyText: cms.lang.system.form.emptyText,
					displayField: 'name',
					valueField: 'id',
					queryMode: 'local'
				}]
			},{
				xtype: 'fieldset',
				title: cms.lang.system.form2.title,
				defaultType: 'panel',
				id: 'systemFormRevision'
			}]
		});

		Ext.MessageBox.wait(cms.lang.system.message2.waitMsg);
		Ext.Ajax.request({
			url: 'cms/system/read',
			success: function(response) {
				var r = Ext.JSON.decode(response.responseText);
				
				// update the contact email address
				if (r.email != null)
					Ext.getCmp('systemFormEmail').setValue(r.email);
				if (r.language != null)
					Ext.getCmp('languageComboBox').setValue(r.language);

				// update the revision panel
				var out = '<div id="systeminfo"><span class="icon very-big green">"</span> '+cms.lang.system.message2.success+'</div>';
				if (r.revision.system != r.revision.current)
					out = '<div id="systeminfo">'
						+ '<p><span class="icon very-big red">8</span> '
						+ cms.lang.system.message2.error2
						+ ' '
						+ cms.lang.system.message2.error3
						+ ' <a href="http://code.google.com/p/weirdbird-cms/source/list">'
						+ cms.lang.system.message2.error4
						+'</a> '
						+ cms.lang.system.message2.error5
						+ '</p>'
						+ '<p>&nbsp;</p>'
						+ '<p> '
						+ cms.lang.system.message2.error6
						+ ' '
						+ r.revision.system
						+ '<br/>'
						+ cms.lang.system.message2.error7 
						+ ' '
						+ r.revision.current + ' from ' + r.revision.creationdate
						+ '</div>';
				Ext.getCmp('systemFormRevision').add({html:out});
				Ext.MessageBox.updateProgress(1);
				Ext.MessageBox.hide();
			},
			failure: function(response) {
				Ext.MessageBox.hide();
				Ext.MessageBox.alert('Error', cms.lang.system.message2.error + ' (Error code ' + response.status + ').');
			}
		});

		cms.fillContentPanel(Ext.getCmp('systemForm'));
	}
});


Ext.onReady(function(){
	Ext.ns('cms');
	cms = new WeirdbirdCMS();
	// start the cms
	cms.init();
});