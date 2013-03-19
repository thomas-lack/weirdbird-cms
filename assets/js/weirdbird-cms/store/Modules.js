Ext.define('WeirdbirdCMS.store.Modules', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Module',

	proxy: {
        type: 'ajax',
        url: 'cms/modules/read',
        reader: {
            type: 'json',
            successProperty: 'success'
        }
    },
    autoLoad: true,
    autoSync: false
});