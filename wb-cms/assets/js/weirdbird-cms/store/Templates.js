Ext.define('WeirdbirdCMS.store.Templates', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Template',

	proxy: {
        type: 'ajax',
        url: 'cms/templates/read',
        reader: {
            type: 'json',
            successProperty: 'success'
        }
    },
    autoLoad: true,
    autoSync: false
});