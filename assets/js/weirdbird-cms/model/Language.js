Ext.define('WeirdbirdCMS.model.Language', {
	extend: 'Ext.data.Model',

	fields: [
		{name:'id', type:'int'}, 
		{name:'name', type:'string'}, 
		{name:'shortform', type:'string'}
	]
});