Ext.define('WeirdbirdCMS.controller.FileManager', {
	extend: 'Ext.app.Controller',

	requires: [
		'Ext.window.Window'
	],

	stores: [ 'Files' ],
	models: [ 'File' ],

	rowEditing: Ext.create('Ext.grid.plugin.RowEditing', {
        clicksToMoveEditor: 1,
        autoCancel: false
    }),

	/**
	*	Manages the grid that is responsible for the file management
	*/
	populateFilesGrid: function() {
		if (_cms.debug) console.log('populating files grid');

		// instantiate the view
	    if ( ! Ext.isDefined(Ext.getCmp('filesGrid')) )
	    	Ext.create('WeirdbirdCMS.view.FileManager');

	    // make "delete file" button clickable if a row is selected
		Ext.getCmp('filesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('filesGrid').down('#deleteFile').setDisabled(selections.length === 0);
	    });
		
		// add view to viewport
		_cms.fillContentPanel(Ext.getCmp('filesGrid'));
	},

	/**
	 * Event handler: upload file button pressed
	 */
	onUploadBtn: function() {
		Ext.create('Ext.window.Window', {
		    id: 'uploadWindow',
		    title: _cms.lang.filemanager.window.title,
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
			    	fieldLabel: _cms.lang.filemanager.window.description
			    },{
			    	xtype: 'filefield',
			    	id: 'form-file',
			    	emptyText: _cms.lang.filemanager.window.emptyText,
			    	fieldLabel: _cms.lang.filemanager.window.file,
			    	buttonText: '<span class="icon very-big">&Oslash;</span>'
		    	}]
		    }],

		    buttons: [{
		    	text: _cms.lang.filemanager.window.save,
		    	handler: function() {
		    		var form = Ext.getCmp('file-form').getForm();
		    		if(form.isValid()){
		    			form.submit({
		    				url: 'cms/filemanager/create',
		    				waitMsg: 'Uploading file...',
		    				success: function(fp, o) {
		    					Ext.getCmp('uploadWindow').close();
		    					Ext.getStore('Files').reload();
		    				}
		    			});
		    		}
		    	}
		    },{
		    	text: _cms.lang.filemanager.window.reset,
		    	handler: function() {
		    		Ext.getCmp('file-form').getForm().reset();
		    	}
		    }]
		}).show();
	},

	/**
	 * Event handler: delete file button pressed
	 */
	onDeleteBtn: function() {
		Ext.Msg.show({
			title: _cms.lang.filemanager.message.title,
			msg: _cms.lang.filemanager.message.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.WARNING,
			fn: function(btn) {
				if (btn == 'yes') {
					var record = Ext.getCmp('filesGrid').getSelectionModel().getSelection()[0];
					Ext.getStore('Files').remove(record);
				}
			}
		});
	}
});