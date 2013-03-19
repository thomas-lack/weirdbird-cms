Ext.define('WeirdbirdCMS.model.User', {
	extend: 'Ext.data.Model',

	fields: [
		{name:'id', type:'int'}, 
		{name:'email', type:'string'}, 
		{name:'username', type:'string'},
		{name:'logins', type:'int'}, 
		{name:'last_login', type:'date'},
		{name:'roles', type:'string'}
	]
});