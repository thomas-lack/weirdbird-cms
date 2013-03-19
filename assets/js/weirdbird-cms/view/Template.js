Ext.define('WeirdbirdCMS.view.Template', {
	extend: 'Ext.grid.Panel',

	requires: [
		'Ext.grid.column.Template'
	],

	id: 'templatesGrid',
    title: _cms.lang.templates.title,
    border: false,
    bodyCls: 'content',
    store: Ext.getStore('Templates'),
    columns: [
    	{ text: _cms.lang.templates.grid.active, xtype: 'templatecolumn', width:50,
    		tpl: '<tpl if="active"><span class="icon green very-big">&Atilde;</span>'
    			+ '<tpl else><span class="icon red very-big">&Acirc;</span></tpl>'},
    	{ text: _cms.lang.templates.grid.preview , width: 270, xtype: 'templatecolumn',
    		tpl: '<p><img src="{folder}/{folder_preview}/{previewimage_filename}" /></p>'
    			+ '<p class="sans-serif very-small uppercase dark-gray normal-lh">{previewimage_description}</p>'},
    	{ text: _cms.lang.templates.grid.description, flex: 1, xtype: 'templatecolumn',
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
    	text: '<span class="icon very-big">&Ntilde;</span> ' + _cms.lang.templates.button.import,
    	handler: function() {
    		_cms.getController('Template').onImportBtn();
    	}
    },'-',{
    	text: '<span class="icon very-big">G</span> ' + _cms.lang.templates.button.active,
    	disabled: true,
    	itemId: 'activateTemplate',
    	handler: function() {
    		_cms.getController('Template').onActivateBtn();
    	}
    }]
});