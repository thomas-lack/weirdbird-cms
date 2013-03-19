Ext.define('WeirdbirdCMS.store.Users', {
	extend: 'Ext.data.Store',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.User',

    lastOperation: '',

	proxy: {
        type: 'ajax',
        api: {
            read: 'cms/user/read',
            create : 'cms/user/create',
            update : 'cms/user/update',
            destroy : 'cms/user/destroy'
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
        load: function() {
            // after loading select the first entry to populate the 2nd form panel
            //Ext.getCmp('filesGrid').getSelectionModel().select(0);
        },
        write: function(store, op) {
            // if last operation was "create" and now we have an update,
            // we want to reload the store afterwards to get the objects new id
            var s = Ext.getStore('Users');
            if (s.lastOperation == 'create'
                && op.action == 'update') {
                s.load();
            }
            
            s.lastOperation = op.action;
        }
    }
});