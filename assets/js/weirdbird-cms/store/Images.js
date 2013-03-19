Ext.define('WeirdbirdCMS.store.Images', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Image',

	proxy: {
        type: 'ajax',
        url: 'cms/file/images',
        reader: {
            type: 'json'
        }
    },
    autoLoad: true
});