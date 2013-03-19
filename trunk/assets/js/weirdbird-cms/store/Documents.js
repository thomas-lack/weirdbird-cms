Ext.define('WeirdbirdCMS.store.Documents', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Document',

	proxy: {
        type: 'ajax',
        url: 'cms/file/documents',
        reader: {
            type: 'json'
        }
    },
    autoLoad: true
});