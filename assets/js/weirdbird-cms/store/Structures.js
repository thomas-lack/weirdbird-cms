Ext.define('WeirdbirdCMS.store.Structures', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.Structure',

    // helper attribute to remember the last operation
    // called on this store
    lastOperation: '',

	proxy: {
        type: 'ajax',
        api: {
            read: 'cms/structures/read',
            create : 'cms/structures/create',
            update : 'cms/structures/update',
            destroy : 'cms/structures/destroy'
        },
        reader: {
            type: 'json',
            successProperty: 'success'
        },
        writer: {
            type: 'json'
        }
    },

    autoLoad: true,
    autoSync: true,

    listeners: {
        write: function(store, op) {
            // if last operation was "create" and now we have an update,
            // we want to reload the store afterwards to get the objects new id
            var s = Ext.getStore('Structures');
            if (s.lastOperation == 'create' && op.action == 'update') {
                s.load();
            }
            
            s.lastOperation = op.action;
        }
    }
});