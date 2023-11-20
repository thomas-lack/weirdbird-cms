Ext.define('WeirdbirdCMS.store.Layouts', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Layout',

	proxy: { 
        type: 'ajax',
        url: 'cms/layouts/read',
        reader: { 
            type: 'json',
            successProperty: 'success' 
        },
    },
    autoLoad: true,
    autoSync: false
});