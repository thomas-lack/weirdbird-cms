Ext.define('WeirdbirdCMS.controller.Article', {
	extend: 'Ext.app.Controller',

	requires: [
		'Ext.Msg',
		'Ext.Ajax',
		'WeirdbirdCMS.util.SelectImageWindow',
		'WeirdbirdCMS.util.SelectDocumentWindow'
	],

	stores: [ 
		'Images',
		'Documents',
		'ArticlesTree'
	],
	models: [ 
		'Image',
		'Document',
		'ArticleTreeNode'
	],
	
	// internal data structures
	treeStore: null,
	cssData: null,
	currentNode: null,
	initialDataChange: true,	// helper attribute to identify if data was loaded or really changed by user
	initialTitle: '',			// helper attribute to remember the article title before it was edited
	initialActive: null,		// helper attribute to remember the initial active state of an article
	record: null,				// helper attribute to remember the currently clicked record id

	/*
	* Fill the articles grid with data
	*
	* cssdata: array containing objects with paths to used css files e.g. [{path:'../styles.css'}]
	*/
	prepareArticlesPanel: function(cssdata) {
		if (_cms.debug) {
			console.log('populating articles treeview');
		}

		// bugfix: manually destroy the tinyMCE editor object if it exists, else
		// the article editing page cannot be created a second time because of dom errors
		if ( Ext.isDefined(Ext.getCmp('articleFieldContent')) ) {
			Ext.getCmp('articleFieldContent').destroy();
		}

		_cms.getController('Article').cssData = cssdata;
		_cms.getController('Article').paintArticlesPanel();
	},

	/*
	* After loading the prepared tree store data for the articles panel,
	* it can be added to the DOM
	*/
	paintArticlesPanel: function() {
		if ( ! Ext.isDefined(Ext.getCmp('articlesParentPanel')) ) {
			Ext.create('WeirdbirdCMS.view.Article');
		}
		
		// reload store on every repaint - just in case the structures changed
		Ext.getStore('ArticlesTree').load();

		// add view to viewport
		_cms.fillContentPanel(Ext.getCmp('articlesParentPanel'));
	},

	/**
	 * Helper method to update the article panel with new content data from the backend
	 */
	updateArticlesPanel: function() {
		// load leaf data
		Ext.Ajax.request({
			url: 'cms/articles/read/' + _cms.getController('Article').record.data.id,

			success: function(response) {
				var editPanel = Ext.getCmp('articlePanel'), 
					data = Ext.JSON.decode(response.responseText);

				_cms.getController('Article').initialDataChange = true;
				_cms.getController('Article').initialTitle = data.title; // remember initial title for later treeview resetting
								
				// set language field according to the store mapping
				if (Ext.isNumeric(data.language_id)) {
					Ext.getCmp('articleFieldLanguage')
						.setValue(Ext.getStore('Languages')
						.getById(parseInt(data.language_id, 10))
						.get('name'));
				}
				else {
					Ext.getCmp('articleFieldLanguage').setValue(null);
				}

				// set other field values
				Ext.getCmp('articleFieldActive').setValue(data.active);
				Ext.getCmp('articleFieldTitle').setValue(data.title);
				Ext.getCmp('articleFieldDescription').setValue(data.description);
				Ext.getCmp('articleFieldTeaserContent').setValue(data.teaser);
				Ext.getCmp('articleFieldContent').setValue(data.content);

				_cms.getController('Article').initialDataChange = false;
				editPanel.enable();
			},
			failure: function(response) {
				Ext.MessageBox.alert('Error',  _cms.lang.articles.message2.error 
					+ ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Adds a new article skeleton to the list of articles
	 */
	addArticle: function() {
		var node = Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
		
		Ext.Ajax.request({
			url: 'cms/articles/create',
			params: { mapping_id : node.data.hrefTarget },

			success: function(response) {
				var r = Ext.JSON.decode(response.responseText),
					newNode = node.createNode({id: r.id, text: 'new title', iconCls: 'icon-inactive', leaf: true});

				node.appendChild(newNode);
			},
			failure: function(response) {
				Ext.MessageBox.alert('Error', _cms.lang.articles.message5.error 
					+ ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Postpones the current article to the backend, so it can be saved to the db from there
	 */
	saveArticle: function() {
		tinymce.triggerSave(); 	// has to be done, because tinymce is an addon and the underlying 
								// form field needs to be updated
		var request = {},
			languageId = Ext.getCmp('articleFieldLanguage').getValue();
		
		// check if the title field contains a valid value
		if (!Ext.getCmp('articleFieldTitle').isValid()) {
			Ext.MessageBox.alert('Error', _cms.lang.articles.message8.error);
			return;
		}

		// if the combobox was not yet changed, the id field is not set - 
		// we have to do this manually
		if (!Ext.isNumeric(languageId) && languageId !== null) {
			languageId = Ext.getStore('Languages').findRecord('name', languageId).get('id');
		}
		
		request.language_id = languageId;
		request.active = Ext.getCmp('articleFieldActive').getValue();
		request.title = Ext.getCmp('articleFieldTitle').getValue();
		request.description = Ext.getCmp('articleFieldDescription').getValue();
		request.teaser = Ext.getCmp('articleFieldTeaserContent').getValue();
		request.content = Ext.getCmp('articleFieldContent').getValue();
		
		Ext.Ajax.request({
			url: 'cms/articles/update/'+ _cms.getController('Article').record.data.id,
			params: request, 

			success: function() {
				Ext.MessageBox.alert('Status', _cms.lang.articles.message3.success);
				_cms.getController('Article').record.commit(); //remove the dirty flag
			},
			failure: function(response) {
				Ext.MessageBox.alert('Error', _cms.lang.articles.message3.error 
					+ ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Informs the backend, that the currently selected article has to be deleted
	 */
	deleteArticle: function() {
		Ext.Msg.show({
			title: _cms.lang.articles.message4.title,
			msg: _cms.lang.articles.message4.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.QUESTION,
			fn: function(btn) {
				if (btn === 'yes') {
					Ext.Ajax.request({
						url: 'cms/articles/destroy/' + _cms.getController('Article').record.data.id,
						success: function() {
							var node = Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
							node.remove();
						},
						failure: function(response) {
							Ext.MessageBox.alert('Error', _cms.lang.articles.message4.error 
								+ ' (Error code ' + response.status + ').');
						}
					});
				}
			}
		});
	},

	/**
	*	Helper method to process a context change of the treepanel
	*	(clicking another article or whatever)
	*/
	leaveArticle: function(newRecord, oldRecord) {
		// check if the current record should be saved first ?
		if (oldRecord !== null && oldRecord.dirty) {	
			Ext.Msg.show({
				title: _cms.lang.articles.window3.title,
				msg: _cms.lang.articles.window3.content,
				buttons: Ext.Msg.YESNO,
				icon: Ext.Msg.QUESTION,
				fn: function(btn) {
					// save if yes is pressed
					if (btn === 'yes') {
						_cms.getController('Article').saveArticle();
					}
					else {
						// restore the old title in the treeview if 'no' is pressed
						var title = _cms.getController('Article').initialTitle;
						oldRecord.data.text = title;
						oldRecord.set('title', title);

						// reset the previously edited node's active indicator icon if needed
						_cms.getController('Article').currentNode.data.iconCls = _cms.getController('Article').initialActive;
						_cms.getController('Article').currentNode.triggerUIUpdate();
					}

					// anyways we save the treepanel record for now to indicate the non-dirty state
					oldRecord.commit();
					// disable the edit panel for now if we are changing focus
					Ext.getCmp('articlePanel').disable();
					
					// load new data into the articles panel if appropriate
					if (newRecord.data.leaf) {
						// remember the currently clicked record id as hidden value
						_cms.getController('Article').record = newRecord;
						// remember the new records active state and node
						_cms.getController('Article').initialActive = newRecord.data.iconCls;
						_cms.getController('Article').currentNode = 
							Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
						// update the article edit panel
						_cms.getController('Article').updateArticlesPanel();
					}
				}
			});
		}
		else {
			Ext.getCmp('articlePanel').disable();
			
			if (newRecord !== null && newRecord.data.leaf) {
				this.record = newRecord;
				this.initialActive = newRecord.data.iconCls;
				this.currentNode = Ext.getCmp('articlesTreePanel').getSelectionModel().getSelection()[0];
				this.updateArticlesPanel();
			}
		}		
	},

	/**
	 * Event handler: a new item of the treepanel was selected
	 */
	onTreePanelSelect: function(self, record) {
		// first check, if the user is leaving a currently edited article
		this.leaveArticle(record, this.record);

		// disable all buttons after click
		var buttonIDs = ['addArticleBtn', 'saveArticleBtn', 'deleteArticleBtn'];
		Ext.each(buttonIDs, function(id){
			Ext.getCmp(id).disable(true);
		});
		
		// on a column field we want to enable adding articles
		// remember: columns are on 2nd level and not leafs
		if (record.parentNode.parentNode !== null && !record.data.leaf && record.parentNode.data.parentId !== 'root') {
			Ext.getCmp('addArticleBtn').enable(true);
		}
		
		// leafes can be deleted for now
		if (record.data.leaf) {
			Ext.getCmp('deleteArticleBtn').enable(true);
			Ext.getCmp('saveArticleBtn').enable(true);
		}
	},

	/**
	 * Event handler: an item of the tree store was moved via drag & drop
	 */
	onTreePanelItemMove: function(node, oldParent, newParent) {
		// change mapping if the parent tree node has changed
		if (newParent !== oldParent) {
			Ext.Ajax.request({
				url: 'cms/articles/changemapping/' + node.data.id,
				params: { mapping_id: newParent.data.hrefTarget },
				failure: function(response) {
					Ext.MessageBox.alert('Error', _cms.lang.articles.message.error 
						+ ' (Error code ' + response.status + ').');
				}
			});
		}

		// notify the backend, that the positioning of the current parent nodes leafs has changed
		var leafOrder = [];
		Ext.each(newParent.childNodes, function(node){
			leafOrder.push(node.data.id);
		});
		Ext.Ajax.request({
			url: 'cms/articles/changepositions',
			params: { 'sortOrder[]': leafOrder },
			failure: function(response) {
				Ext.MessageBox.alert('Error', _cms.lang.articles.message7.error 
					+ ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Event handler: any field besides the title field of the current article has changed
	 */
	onArticleChange: function() {
		//var editPanel = Ext.getCmp('articlePanel');
		if (!this.initialDataChange) {
			Ext.getCmp('saveArticleBtn').enable(true); 
			// mark record as dirty
			this.record.setDirty();
		}
	},

	/**
	 *
	 */
	onArticleActiveChange: function(self, newValue) {
		// set active icon indicator (currentNode was set beforehand in method 'onArticleChange')
		this.currentNode.data.iconCls = newValue ? 'icon-active' : 'icon-inactive';
		this.currentNode.triggerUIUpdate();
	},

	/**
	 * Event handler: the title field of the current article has changed
	 */
	onArticleTitleChange: function(self, newValue) {
		//var editPanel = Ext.getCmp('articlePanel');
		if (!this.initialDataChange) {
			Ext.getCmp('saveArticleBtn').enable(true); 
			// mark record as dirty
			this.record.setDirty();
			// update treepanel title
			if (this.record !== null) {
				this.record.data.text = newValue;
				this.record.set('title', newValue); // used to update the treepanel -.-
			}
		}
	},

	/**
	 * Opens a window with image selection capabilities
	 *
	 * @param 	editorObj 	calling editor object
	 */
	createSelectImageWindow: function(editorObj) {
		Ext.create('WeirdbirdCMS.util.SelectImageWindow').show(editorObj);
	},

	/**
	 * Opens a window with document selection capabilities
	 *
	 * @param 	editorObj 	calling editor object
	 */
	createSelectDocumentWindow: function(editorObj) {
		Ext.create('WeirdbirdCMS.util.SelectDocumentWindow').show(editorObj);
	},

	/**
	 * Helper method to calculate the optimum height of the editor textarea
	 */
	calculateEditArticleHeight: function(bottomWidth) {
		if (Ext.typeOf(bottomWidth) !== 'number') {
			bottomWidth = 0;
		}

		var bestHeight = Ext.getCmp('navmenu').getHeight() - bottomWidth;
		return ((bestHeight < 350) ? 350 : bestHeight);
	}
});