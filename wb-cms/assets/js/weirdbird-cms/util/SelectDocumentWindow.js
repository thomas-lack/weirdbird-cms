Ext.define('WeirdbirdCMS.util.SelectDocumentWindow', {

	requires: [
		'Ext.window.Window',
		'Ext.view.View',
		'Ext.XTemplate',
		'Ext.grid.Panel'
	],

	/**
	 * Creates a new window with all available images to chose from
	 *
	 * Please note: an image store has to be created and filled before
	 * this method is called
	 *
	 * caller 		can be of type object - then it has to be the tinymce editor object
	 *				or of type string - then it has to be the callers ext-component string
	 */
	show: function(caller) {
		var callByEditor = (Ext.typeOf(caller) == 'object');

		Ext.create('Ext.window.Window', {
			id: 'selectDocumentWindow',
			title: _cms.lang.articles.window2.title,
			width: 600,
			//height: 200,

			items: [{
				xtype: 'gridpanel',
				id: 'selectDocumentGrid',
				store: Ext.getStore('Documents'),
				//width: 400,
				height: 250,
				border: false,
				columns: [
					{ text: _cms.lang.articles.window2.name, dataIndex: 'filename', width: 180 },
					{ text: _cms.lang.articles.window2.description, dataIndex: 'description', flex: 1 },
				]
			}],

			buttons: [{
				text: _cms.lang.articles.window2.select,
				handler: function() {
					// output to tinymce editor panel ?
					if (callByEditor) {
						var record = Ext.getCmp('selectDocumentGrid').getSelectionModel().getSelection()[0];
						caller.focus();
						var linkname = (record.get('description') != '' && record.get('description') != '') 
							? record.get('description') 
							: _cms.lang.articles.window2.link;
						caller.selection.setContent('<a href="/' + record.get('link') + '">' + linkname + '</a>');	
					}
					// otherwise to caller
					else {
						Ext.getCmp(caller).setValue('/' + record.get('link'));
					}
					
					Ext.getCmp('selectDocumentWindow').close();
				}
			},{
				text: _cms.lang.articles.window2.cancel,
				handler: function() {
					Ext.getCmp('selectDocumentWindow').close();
				}
			}]
		}).show();
	}
});