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
		Ext.tip.QuickTipManager.init();
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
				cms.populateArticlesGrid();
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
		    	text: '<span class="icon very-big">G</span> Set Template Active',
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
		    		var s = Ext.data.StoreManager.lookup('structuresStore');
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
		Ext.data.StoreManager.lookup('layoutsStore').load(); // have to load manually, else the combobox bugs

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
		Ext.data.StoreManager.lookup('modulesStore').load();

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
		Ext.data.StoreManager.lookup('columnMappingStore').load();

		var rowEditing = Ext.create('Ext.grid.plugin.RowEditing', {
	        clicksToMoveEditor: 1,
	        autoCancel: false
	    });

		//create outer formpanel
		Ext.create('Ext.form.Panel', {
			id: 'structuresForm',
			renderTo: 'structures-form',
			frame: true,
			layout: 'column',
			items: [
			// left gridpanel
			{
				columnWidth: 0.60,
				xtype: 'gridpanel',
				id: 'categoriesGrid',
				title: 'Categories',
				plugins: [rowEditing],
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
			    	text: '<span class="icon very-big">@</span> Add category',
			    	handler: function() {
			    		rowEditing.cancelEdit();
			    		Ext.data.StoreManager.lookup('structuresStore').insert(0,new Structure());
			    		rowEditing.startEdit(0,0);
			    	}
			    },'-',{
			    	text: '<span class="icon very-big">A</span> Remove category',
			    	itemId: 'deleteCategory',
			    	handler: function() {
			    		Ext.Msg.show({
			    			title: 'Really delete category?',
			    			msg: 'Do you really want to delete the selected category?',
			    			buttons: Ext.Msg.YESNO,
			    			icon: Ext.Msg.WARNING,
			    			fn: function(btn) {
			    				if (btn == 'yes') {
			    					var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
						    		Ext.data.StoreManager.lookup('structuresStore').remove(selection);
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
	                       	var s = Ext.data.StoreManager.lookup('layoutsStore');
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
	            title:'Layout and module selection',
	            defaultType: 'combo',
	            defaults: {
	                width: 300,
	                labelWidth: 90
	            },
				items:[{
					fieldLabel: 'Layout',
					id: 'layoutsComboBox',
					store: Ext.data.StoreManager.lookup('layoutsStore'),
					emptyText: 'Choose layout...',
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
						    	var s = Ext.data.StoreManager.lookup('layoutsStore');
	                       		var i = s.find('id', newValue);
	                       		var rec = s.getAt(i);
						    	cms.paintModuleSelectionBoxes(rec.data.columns);
							}
						}
					}
				}]
			}]
		});
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
				fieldLabel: 'Column ' + (i+1) + ' module',
				id: 'moduleComboBoxColumn' + i,
				store: Ext.data.StoreManager.lookup('modulesStore'),
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
					    			Ext.data.StoreManager.lookup('columnMappingStore').load();
					    		}
					    	});
						}
					}
				}
			});

			// if a module was selected before, set the value
			var structure_id = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0].data.id;
			var q = Ext.data.StoreManager.lookup('columnMappingStore').query('structure_id', structure_id);
			for (var j=0; j < q.items.length; j++) {
				var data = q.items[j].data;
				if (data.column == i) {
					var index = Ext.data.StoreManager.lookup('modulesStore').find('id', data.module_id);
					var d = Ext.data.StoreManager.lookup('modulesStore').getAt(index).data.description;
					Ext.getCmp('moduleComboBoxColumn' + i).setValue(d);
				}
			}
		}
	},

	/*
	* Fill the articles grid with data
	*/
	populateArticlesGrid: function() {
		var store = Ext.create('Ext.data.TreeStore', {
		    root: {
		        expanded: true,
		        children: [
		            { text: "Willkommen", expanded: true, children: [
		            	{ text: 'Column 1', expanded: true, children: [
		            		{ text: 'Willkommenstext', leaf: true}
		            	]},
		            	{ text: 'Column 2 (not editable)', expanded: false, children: []},
		            ] },
		            { text: "Schulprogramm", expanded: false, children: [
		            	{ text: 'Column 1', expanded: true, children: [
		            		{ text: 'Kollegium', leaf: true },
		            		{ text: 'mitSprache', leaf: true }
		            	]},
		            	{ text: 'Column 2 (not editable)', expanded: false, children: []},
		            ] },
		            { text: "Stadtteil", expanded: false, children: [
		            	{ text: 'Column 1', expanded: true, children: [
		            		{ text: 'Stadtteilinfo', leaf: true}
		            	]},
		            	{ text: 'Column 2 (not editable)', expanded: false, children: []},
		            ] }
		        ]
		    }
		});
		
		Ext.define('Structure', {
			extend: 'Ext.data.Model',
			fields: [ 'id', 'active', 'position', 'title', 'description', 'layout_id' ],
			//hasMany: { model: 'Column', name: 'columns' },
			proxy: {
				type: 'ajax',
				url: 'cms/structures/read',
				reader: { type: 'json' , root: '' }
			}
		});

		// load modules of current template
		Ext.create('Ext.data.Store', {
			id: 'structuresStore',
			model: 'Structure',
			autoLoad: true,
			listeners: {
				load: function(self, records, success) {
					console.log(self, records, success);
				}
			}
		});

		Ext.create('Ext.panel.Panel', {
			layout: 'column',
			renderTo: 'article-editing',
			frame: true,
			//border: 0,
			items: [{
				columnWidth: 0.31,
				xtype: 'treepanel',
				id: 'articlesTreePanel',
				title: 'Category/Column selection',
				store: store, //Ext.data.StoreManager.lookup('structuresStore'),
				rootVisible: false,
				tbar: [
					{ xtype: 'button', text: '<span class="icon very-big">@</span>&nbsp;Add article' },
					'-',
					{ xtype: 'button', text: '<span class="icon very-big">&Atilde;</span>&nbsp;Save article' },
					'-',
				  	{ xtype: 'button', text: '<span class="icon very-big">&Acirc;</span>&nbsp;Delete article' }
				]
			},{
				columnWidth: 0.69,
				xtype: 'fieldset',
				id: 'articlesEditPanel',
				title: 'Article editing',
				margin: '0 0 0 10',
				defaultType: 'textfield',
	            defaults: {
	                width: 300,
	                //labelWidth: 70,
	                labelAlign: 'top',
	                margin: '0 0 10 0'
	            },
				items: [{
					fieldLabel: 'Active',
					xtype: 'checkbox'
				},{
					fieldLabel: 'Title'
				},{
					fieldLabel: 'Description',
					xtype: 'textareafield',
					width: 580,
					height: 100

				},{
					fieldLabel: 'Article',
					xtype: 'htmleditor',
					width: 580,
					height: 300,
					resizable: true
				}]
			}]
		});


		//cms.generateHtmlEditor();
	},
	/*
	* Helper method to fill the editor DIV with a new html editor
	*/
	generateHtmlEditor: function(id, parent) {
		console.log(parent);

		return Ext.create('Ext.form.HtmlEditor', {
			width: 580,
			height: 250,
			resizable: true,
			//renderTo: 'article-editing'
		});
	}

}


$(document).ready(function(){
	cms.init();
});