Ext.define('WeirdbirdCMS.store.ArticlesTree', {
	extend: 'Ext.data.TreeStore',

	requires: ['Ext.data.reader.Json'],

	model: 'WeirdbirdCMS.model.ArticleTreeNode',

    lastOperation: '',

	proxy: {
        type: 'ajax',
        api: {
            read: 'cms/articles/treeview',
            update: null
        },
        reader: {
            type: 'json',
            root: 'children',
            successProperty: 'success',
            idProperty: 'id'
        }
    },
    autoLoad: false,
    autoSync: false,

    root: {
        expanded: true,
        loaded: true,
    },

    listeners: {
        load: function() {
            // nothing to do...
        }
    }
});