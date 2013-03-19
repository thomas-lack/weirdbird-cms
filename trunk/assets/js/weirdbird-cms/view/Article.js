Ext.define('WeirdbirdCMS.view.Article', {
	extend: 'Ext.panel.Panel',

	requires: [
		'Ext.tree.Panel',
		'Ext.tab.Panel',
		'Ext.layout.container.Column',
		//'Ext.layout.container.VBox',
		'Ext.form.FieldSet',
		'Ext.form.field.Checkbox',
		'Ext.form.field.Display',
		'Ext.form.field.Text',
		'Ext.form.field.TextArea'
	],
	
	id: 'articlesParentPanel',
	title: _cms.lang.articles.title,
	bodyCls: 'content',
	border: false,
	layout: 'column',
	listeners: {
		afterrender: function(self) {
			_cms.getController('Article').onParentAfterRender();
		}
	},

	items: [{
		////////////////////
		// ITEM 1: TreePanel
		////////////////////
		columnWidth: 0.31,
		height: Ext.getCmp('navmenu').getHeight() - 25,
		xtype: 'treepanel',
		id: 'articlesTreePanel',
		title: _cms.lang.articles.grid.title,
		store: _cms.getController('Article').treeStore,
		rootVisible: false,
		border: false,
		viewConfig: {
			plugins: { ptype: 'treeviewdragdrop' }
		},

		tbar: [ { 
			xtype: 'button', 
			id: 'addArticleBtn',
			text: '<span class="icon very-big">@</span>&nbsp;' + _cms.lang.articles.button.add, 
			disabled: true,
			handler: function(self, e) {
				if (_cms.debug) console.log('add article button pressed');
				_cms.getController('Article').addArticle();
			}
		},'-',{ 
			xtype: 'button', 
			id: 'saveArticleBtn',
			text: '<span class="icon very-big">&Atilde;</span>&nbsp;' + _cms.lang.articles.button.save, 
			disabled: true,
			handler: function(self, e) {
				if (_cms.debug) console.log('save article button pressed');
				_cms.getController('Article').saveArticle();
			} 
		},'-',{ 
			xtype: 'button', 
			id: 'deleteArticleBtn',
			text: '<span class="icon very-big">&Acirc;</span>&nbsp;' + _cms.lang.articles.button.delete, 
			disabled: true,
			handler: function(self, e) {
				if (_cms.debug) console.log('delete article button pressed');
				_cms.getController('Article').deleteArticle();
			}
		}],

		listeners: {
			select: function(self, record, index) {
				_cms.getController('Article').onTreePanelSelect(self, record, index);
			},

			// handling a (via drag&drop) moved item
			itemmove: function(node, oldParent, newParent, index, eopts) {
				_cms.getController('Article').onTreePanelItemMove(node, oldParent, newParent, index, eopts);
			}
		}
	},{
		////////////////////
		// ITEM 2: TabPanel
		////////////////////
		columnWidth: 0.69,
		xtype: 'tabpanel',
		id: 'articlePanel',
		disabled: true,
		resizeTabls: true,
		enableTabScroll: true,
		border: false,
		record: null,
		initialDataChange: true,	// helper attribute to identify if data was loaded or really changed by user
		initialTitle: '',			// helper attribute to remember the article title before it was edited
		defaults: {
			autoScroll: true,
			bodyPadding: 10
		},
		margin: '0 0 0 10',
		items: [{
			////////////////////
			// FIRST TAB (article settings)
			////////////////////
			title: _cms.lang.articles.tab1.title,
			border: false,
			id: 'articleSettingsPanel',
			items: [{
				xtype: 'fieldset',
				id: 'articleSettingsPanelFieldset',
				border: false,
				defaults: {
	                width: 500,
	                labelWidth: 70,
	                labelAlign: 'top',
	                margin: '0 0 10 0'
	            },
	            items: [{
					name: 'language',
					xtype: 'combobox',
					fieldLabel: _cms.lang.system.form.language,
					id: 'articleFieldLanguage',
					store: Ext.getStore('Languages'),
					emptyText: _cms.lang.articles.tab1.language,
					displayField: 'name',
					valueField: 'id',
					queryMode: 'local',
					width: 200
				},{
	            	fieldLabel: _cms.lang.articles.tab1.active,
					xtype: 'checkbox',
					id: 'articleFieldActive',
					labelAlign: 'left',
					listeners: {
						change: function(self, newValue, oldValue) { 
							_cms.getController('Article').onArticleChange(self, newValue, oldValue);
						}
					}
	            },{
					fieldLabel: _cms.lang.articles.tab1.titleLable,
					id: 'articleFieldTitle',
					xtype: 'textfield',
					allowBlank: false,
					regex: new RegExp('[a-zA-Z0-9]+'),
					regexText: _cms.lang.articles.message8.error,
					listeners: {
						change: function(self, newValue, oldValue) { 
							_cms.getController('Article').onArticleTitleChange(self, newValue, oldValue);
						}
					}
				},{
					fieldLabel: _cms.lang.articles.tab1.description,
					xtype: 'textareafield',
					id: 'articleFieldDescription',
					width: 580,
					height: 70,
					listeners: {
						change: function(self, newValue, oldValue) { 
							_cms.getController('Article').onArticleChange(self, newValue, oldValue);
						}
					}
				}]
			}]
		},{
			////////////////////
			// SECOND TAB (edit teaser)
			////////////////////
			title: _cms.lang.articles.tab2.title,
			id: 'articleTeaserPanel',
			border: false,
			defaults: {
				border:false
			},
			items: [{
				xtype: 'tinymce_textarea',
				id: 'articleFieldTeaserContent',
				width: 640,
				height: _cms.getController('Article').calculateEditArticleHeight(77),
				resizable: false, //true
				tinyMCEConfig: {
					border:false,
					theme_advanced_row_height: 27,
                    delta_height: 0,
                    relative_urls: false,
                    schema: 'html5',
                    plugins : "autolink,lists,pagebreak,style,table,advhr,advlink,iespell,inlinepopups,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,sub,sup,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect', //styleselect,fontselect,fontsizeselect
                    theme_advanced_buttons2 : 'table,|,bullist,numlist,|,blockquote,hr,|,search,replace,|,link,unlink,|,wbimage,wbdocument,|,code,preview,fullscreen',
                    content_css: ((_cms.getController('Article').cssData.length > 0) ? 
                    					_cms.getController('Article').cssData[0].path : null), //TODO: add more than one css file
                    theme_advanced_containers_default_align : 'left',
                    setup: function(editor) {
                    	// Add a custom image button
                    	editor.addButton('wbimage', {
                    		title: _cms.lang.articles.tab3.image,
                    		image: 'assets/images/icons_48x48/Picture.png',
                    		onclick: function() {
                    			_cms.getController('Article').createSelectImageWindow(editor);
                    		}
                    	});
						
						// add a custom pdf document button
						editor.addButton('wbdocument', {
							title: _cms.lang.articles.tab3.document,
							image: 'assets/images/pdf.jpg',
							onclick: function() {
								_cms.getController('Article').createSelectDocumentWindow(editor);
							}
						});						
                    }
				},
				listeners: {
					change: function(self, newValue, oldValue) { 
						_cms.getController('Article').onArticleChange(self, newValue, oldValue);
					}
				}
			}]
		},{
			////////////////////
			// THIRD TAB (edit article)
			////////////////////
			title: _cms.lang.articles.tab3.title,
			id: 'articleEditPanel',
			border: false,
			items: [{
				xtype: 'tinymce_textarea',
				id: 'articleFieldContent',
				width: 640,
				height: _cms.getController('Article').calculateEditArticleHeight(77),
				resizable: false, //true
				tinyMCEConfig: {
					border:false,
					theme_advanced_row_height: 27,
                    delta_height: 0,
                    relative_urls: false,
                    schema: 'html5',
                    plugins : "autolink,lists,pagebreak,style,table,advhr,advlink,iespell,inlinepopups,preview,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,advlist",
                    theme_advanced_toolbar_align : "left",
                    theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,sub,sup,|,forecolor,backcolor,|,justifyleft,justifycenter,justifyright,justifyfull,|,formatselect', //styleselect,fontselect,fontsizeselect
                    theme_advanced_buttons2 : 'table,|,bullist,numlist,|,blockquote,hr,|,search,replace,|,link,unlink,|,wbimage,wbdocument,|,code,preview,fullscreen',
                    content_css: ((_cms.getController('Article').cssData.length > 0) ? 
                    					_cms.getController('Article').cssData[0].path : null), //TODO: add more than one css file
                    theme_advanced_containers_default_align : 'left',
                    setup: function(editor) {
                    	// Add a custom image button
                    	editor.addButton('wbimage', {
                    		title: _cms.lang.articles.tab3.image,
                    		image: 'assets/images/icons_48x48/Picture.png',
                    		onclick: function() {
                    			_cms.getController('Article').createSelectImageWindow(editor);
                    		}
                    	});
						
						// add a custom pdf document button
						editor.addButton('wbdocument', {
							title: _cms.lang.articles.tab3.document,
							image: 'assets/images/pdf.jpg',
							onclick: function() {
								_cms.getController('Article').createSelectDocumentWindow(editor);
							}
						});						
                    }
				},
				listeners: {
					change: function(self, newValue, oldValue) { 
						_cms.getController('Article').onArticleChange(self, newValue, oldValue);
					}
				}
			}]
		}]
	}]
});