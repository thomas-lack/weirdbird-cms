Ext.define('WeirdbirdCMS.view.Template', {
	extend: 'Ext.grid.Panel',

	requires: [
		'Ext.grid.column.Template'
	],

	id: 'templatesGrid',
    border: false,
    bodyCls: 'content',
    store: Ext.getStore('Templates'),
    columns: [
    	{ text: _cms.lang.templates.grid.active, xtype: 'templatecolumn', width:50,
    		tpl: '<tpl if="active"><i class="icon-ok-sign green very-big"></i>'
    			+ '<tpl else><i class="icon-remove-sign red very-big"></i></tpl>'},
    	{ text: _cms.lang.templates.grid.preview , width: 270, xtype: 'templatecolumn',
    		tpl: '<p><img src="{folder}/{folder_preview}/{previewimage_filename}" /></p>'
    			+ '<p class="sans-serif very-small uppercase dark-gray normal-lh">{previewimage_description}</p>'},
    	{ text: _cms.lang.templates.grid.description, flex: 1, xtype: 'templatecolumn',
    		tpl: '<h2>{name}</h2>'
				+'<p class="justified normal normal-lh">{description}</p>'
				+'<h2>Layouts</h2>'
				+'<ul class="normal normal-lh">'
				+'<tpl for="layouts">'
				+'<li><i class="icon-ok-sign green"></i> {description}</li>'
				+'</tpl>'
				+'</ul>'
				+'<h2>Modules</h2>'
				+'<ul class="normal normal-lh">'
				+'<tpl for="modules">'
				+'<li><i class="icon-ok-sign green"></i> {description}</li>'
				+'</tpl>'
				+'</ul>'
		}
    ],
    tbar: [{
    	text: '<i class="icon-signin big"></i> ' + _cms.lang.templates.button.import,
    	handler: function() {
    		_cms.getController('Template').onImportBtn();
    	}
    },'-',{
    	text: '<i class="icon-bolt big"></i> ' + _cms.lang.templates.button.active,
    	disabled: true,
    	itemId: 'activateTemplate',
    	handler: function() {
    		_cms.getController('Template').onActivateBtn();
    	}
    }]
});