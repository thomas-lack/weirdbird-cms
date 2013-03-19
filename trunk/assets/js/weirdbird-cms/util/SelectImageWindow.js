Ext.define('WeirdbirdCMS.util.SelectImageWindow', {

	requires: [
		'Ext.window.Window',
		'Ext.view.View',
		'Ext.XTemplate'
	],

	/**
	 * Creates a new window with all available images to chose from
	 *
	 * Please note: ideally an image store is present before calling this method,
	 * 				otherwise image data has to be loaded on the fly
	 *
	 * caller 		can be of type object - then it has to be the tinymce editor object
	 *				or of type string - then it has to be the callers ext-component string
	 */
	show: function(caller) {
		// identify the caller
		var callByEditor = (Ext.typeOf(caller) == 'object');

		if (Ext.typeOf(Ext.getStore('Images')) != 'object')
			_cms.getStore('Images').create();
		else
			Ext.getStore('Images').load();

		Ext.create('Ext.window.Window', {
		    id: 'selectImageWindow',
		    title: _cms.lang.articles.window.title,
		    width: 500,
		    y: 50,
		    
		    items: [{
		    	xtype: 'dataview',
		    	id: 'selectImageDataView',
		    	store: Ext.getStore('Images'),
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
		    	text: _cms.lang.articles.window.select,
		    	handler: function() {
		    		var records = Ext.getCmp('selectImageDataView').getSelectionModel().getSelection();
		    		if (records.length === 0) {
		    			Ext.MessageBox.alert(_cms.lang.articles.message6.title, _cms.lang.articles.message6.error);
		    		}
		    		else {
		    			var record = records[0];
		    			
		    			// output to tinymce editor panel ?
		    			if (callByEditor) {
		    				caller.focus();
		    				caller.selection.setContent('<img src="/' + record.get('link') + '" alt="' 
		    					+ record.get('description') + '"/>');
		    			}
		    			// otherwise update calling objects 
		    			else {
		    				Ext.getCmp(caller).setValue('<img src="/' + record.get('thumb') + '">');
		    				Ext.getCmp(caller).imageId = record.get('id');
		    			}

		    			Ext.getCmp('selectImageWindow').close();
		    		}
		    	}
		    },{
		    	text: _cms.lang.articles.window.cancel,
		    	handler: function() {
		    		Ext.getCmp('selectImageWindow').close();
		    	}
		    }]
		}).show();
	}
});