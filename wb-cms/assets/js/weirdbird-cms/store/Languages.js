Ext.define('WeirdbirdCMS.store.Languages', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Language',

	proxy: {
        type: 'ajax',
        url: 'cms/system/languages',
        reader: {
            type: 'json',
            successProperty: 'success'
        }
    },
    autoLoad: true
});