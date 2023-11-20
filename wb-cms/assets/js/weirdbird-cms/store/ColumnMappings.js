Ext.define('WeirdbirdCMS.store.ColumnMappings', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.ColumnMapping',

	proxy: {
        type: 'ajax',
        url: 'cms/structurecolumnmappings/read',
        reader: {
            type: 'json'
        }
    },
    autoLoad: false,
    autoSync: false
});