var cms = {
	debug: true,
	
	init:	function(){
		/*$.blockUI.defaults.css.border = '3px solid #aaa';
		$.blockUI.defaults.css.backgroundColor = 'white';
		$.blockUI.defaults.css.width = '35px';
		$.blockUI.defaults.css.left = '48%';
		$.blockUI.defaults.message = '<img src="/assets/images/ajax-loader.gif"/>';
		*/
		//$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); /* can be used to block the whole document on every ajax request */
		this.registerNavHandlers();
		this.registerDashboardHandlers();
	},
	
	/**
	* Helper method to provide functionality of module loading depending on the 
	* url suffix of the corresponding ajax call
	* (see registerNavHandlers() or registerDashboardHandlers())
	*/
	callerMapping: function(module) {
		switch (module) {
			case 'dashboard' : 
				cms.registerDashboardHandlers();
				break;
			case 'templates' :
				cms.populateTemplatesGrid();
				break;
			case 'structures' :
				cms.populateStructuresGrid();
				break;
			case 'articles' :
				
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
		$('#navmenu > ul > li > a').each(function(){
			var el = $(this);
			var urlSuffix = el.attr('ajax');
			el.unbind();
			el.on('click', function(){
				cms.updateNavigationMenu(urlSuffix);
				
				//$('#content').block();
				$.ajax({
					url: 'cms/' + urlSuffix,
					success: function(data){
						$('#content').html(data);
						cms.callerMapping(urlSuffix);
						//$('#content').unblock();
					},
					failure: function(){
						alert('Oops. An ajax error happened.');
						//$('#content').unblock();
					}
				});
			});
		});
	},
	
	/**
	* register clickable buttons for the dashboard
	*/
	registerDashboardHandlers: function() {
		if (this.debug) console.log('registering dashboard handlers');
		$('.dashboard-list > li').each(function(){
			var el = $(this);
			var urlSuffix = el.attr('href');
			el.unbind();
			el.on('mouseenter', function(){
				$(this).removeClass('unhover-dashboard');
				$(this).addClass('hover-dashboard');
			});
			el.on('mouseleave', function(){
				$(this).addClass('unhover-dashboard');
			});
			el.on('click', function(){
				cms.updateNavigationMenu(urlSuffix);
				
				//$('#content').block();
				$.ajax({
					url: 'cms/' + urlSuffix,
					success: function(data){
						$('#content').html(data);
						cms.callerMapping(urlSuffix);
						$('#content').unblock();
					},
					failure: function(){
						alert('Oops. An ajax error happened.');
						//$('#content').unblock();
					}
				});
			});
		});
	},
	
	/*
	* Change color of the navigation menu on the fly
	*/
	updateNavigationMenu: function(categoryLink) {
		if (this.debug) console.log('resetting navigation menu to: ' + categoryLink);
		$('#navmenu > ul > li > a').removeClass('big bold');
		$('#navmenu > ul > li > span').remove();
		var el = $('#navmenu > ul > li > a[ajax=' + categoryLink + ']');
		el.addClass('big bold');
		el.parent().append('<span class="icon right very-big">=</span>');
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
		    title: 'Templates',
		    renderTo: Ext.get('templates-grid'),
		    autoShow: true,
		    store: Ext.data.StoreManager.lookup('templatesStore'),
		    columns: [
		    	{ text: 'Active?', xtype: 'templatecolumn', width:50,
		    		tpl: '<tpl if="active"><span class="icon green very-big">&Atilde;</span>'
		    			+ '<tpl else><span class="icon red very-big">&Acirc;</span></tpl>'},
		    	{ text: 'Preview' , width: 270, xtype: 'templatecolumn',
		    		tpl: '<p><img src="{folder}/{folder_preview}/{previewimage_filename}" /></p>'
		    			+ '<p class="sans-serif very-small uppercase dark-gray normal-lh">{previewimage_description}</p>'},
		    	{ text: 'Description', flex: 1, xtype: 'templatecolumn',
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
		    	text: '<span class="icon">&Ntilde;</span> Import Templates',
		    	handler: function() {
		    		Ext.Msg.show({
		    			title: 'Really import templates?',
		    			msg: 'If you proceed, all your layout and module mappings will be lost. Do you really want to import all templates again?',
		    			buttons: Ext.Msg.YESNO,
		    			icon: Ext.Msg.WARNING,
		    			fn: function(btn) {
		    				if (btn == 'yes') {
		    					Ext.Ajax.request({
		    						url: 'cms/templates/import',
		    						success: function() {
		    							Ext.MessageBox.alert('Status', 'Templates were imported successfully. Do not forget to set one to active.');
		    							Ext.data.StoreManager.lookup('templatesStore').load();
		    						}
		    					});
		    				}
		    			}
		    		});
		    	}
		    },'-',{
		    	text: '<span class="icon">G</span> Set Template Active',
		    	disabled: true,
		    	itemId: 'activateTemplate',
		    	handler: function() {
		    		var selection = Ext.getCmp('templatesGrid').getView().getSelectionModel().getSelection()[0];
		    		Ext.Ajax.request({
		    			url: 'cms/templates/settemplate/' + selection.data.id,
		    			success: function() {
		    				Ext.MessageBox.alert('Status', 'The template <i>' + selection.data.name + '</i> was successfully set to active.');
		    				Ext.data.StoreManager.lookup('templatesStore').load();
		    			}
		    		});
		    	}
		    }]
		});
	
		// make "set active" button clickable if a row is selected
		Ext.getCmp('templatesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('templatesGrid').down('#activateTemplate').setDisabled(selections.length === 0);
	    });
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
				'position', 'title', 'description', 
				{name:'layout_id', type:'int'}
			]
		});

		Ext.create('Ext.data.Store', {
		    storeId:'structuresStore',
		    model: 'Structure',
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
		});

		var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
	        clicksToMoveEditor: 1,
	        autoCancel: false
	    });

		Ext.create('Ext.grid.Panel', {
		    plugins: [rowEditing],
		    id: 'categoriesGrid',
		    title: 'Categories',
		    renderTo: Ext.get('structures-grid'),
		    autoShow: true,
		    store: Ext.data.StoreManager.lookup('structuresStore'),
		    columns: [
		        { text: '#',  dataIndex: 'position', width:30, editor:{ allowBlank:false }},
		        { text: 'Active?', dataIndex: 'active', width: 50, xtype: 'checkcolumn',
		        	editor: {xtype: 'checkbox', cls: 'x-grid-checkheader-editor'}
		       	},
		        { text: 'Title', dataIndex: 'title', editor:{ allowBlank:false } },
		        { text: 'Description', dataIndex: 'description', flex: 1, editor:{ allowBlank:true } }
		    ],
		    tbar: [{
		    	text: '<span class="icon">@</span> Add category',
		    	handler: function() {
		    		rowEditing.cancelEdit();
		    		Ext.data.StoreManager.lookup('structuresStore').insert(0,new Structure());
		    		rowEditing.startEdit(0,0);
		    	}
		    },'-',{
		    	text: '<span class="icon">A</span> Remove category',
		    	itemId: 'deleteCategory',
		    	disabled: true,
		    	handler: function() {
		    		var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
		    		if (selection) {
		    			Ext.data.StoreManager.lookup('structuresStore').remove(selection);
		    		}
		    	}
		    }]
		});
		
		// make remove button clickable if a row is selected
		Ext.getCmp('categoriesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('categoriesGrid').down('#deleteCategory').setDisabled(selections.length === 0);
	    });
	}
}


$(document).ready(function(){
	cms.init();
});