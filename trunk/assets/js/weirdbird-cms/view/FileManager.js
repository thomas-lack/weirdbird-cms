Ext.define('WeirdbirdCMS.view.FileManager', {
	extend: 'Ext.grid.Panel',

	requires: [
		'Ext.ux.CheckColumn',
		'Ext.grid.column.Date',
		'Ext.grid.column.Template'
	],

	id: 'filesGrid',
    title: _cms.lang.filemanager.title,
    bodyCls: 'content',
    border: false,
    store: Ext.getStore('Files'),
    plugins: [ _cms.getController('FileManager').rowEditing ],
 	
 	columns: [
		{ 
			text: _cms.lang.filemanager.grid.active, dataIndex: 'active', width: 50, xtype: 'checkcolumn',
        	editor: {xtype: 'checkbox', cls: 'x-grid-checkheader-editor'}
       	},
        { 
        	text: _cms.lang.filemanager.grid.creation, dataIndex: 'creationdate', xtype:'datecolumn', format: 'd.m.Y',
    		editor: {allowBlank:false, xtype:'datefield', format: 'd.m.Y'} 
    	},
        { text: _cms.lang.filemanager.grid.user, dataIndex: 'user_id' },
        { text: _cms.lang.filemanager.grid.name, dataIndex: 'filename', width: 120 },
        { text: _cms.lang.filemanager.grid.type, dataIndex: 'type', width: 90 },
        { text: _cms.lang.filemanager.grid.description, dataIndex: 'description', flex: 1, editor:{ allowBlank:true } },
        { 
        	text: _cms.lang.filemanager.grid.preview, xtype: 'templatecolumn', width: 90, 
        	tpl: new Ext.XTemplate(
				'<tpl if="this.isImage(type)">',
			    '<img src="{link}" />',
			    '<tpl else>',
			    '<a href="{link}" target="_blank" style="text-decoration:none; border-bottom:1px dotted; color:#0c3546;">',
			    '<span class="icon very-big">E</span> ' + _cms.lang.filemanager.tpl.openfile + '</a>',
			    '</tpl>',
			    {
			    	isImage: function(type) {
			    		return (type.indexOf('image') !== -1);
			    	}
			    }
			)
        }
	],
    
    tbar: [{
    	text: '<span class="icon very-big">n</span> ' + _cms.lang.filemanager.button.upload,
    	handler: function() {
    		_cms.getController('FileManager').onUploadBtn();
    	}
    },'-',{
    	text: '<span class="icon very-big">m</span> ' + _cms.lang.filemanager.button.delete,
    	disabled: true,
    	itemId: 'deleteFile',
    	handler: function() {
    		_cms.getController('FileManager').onDeleteBtn();	
    	}
    }]
});