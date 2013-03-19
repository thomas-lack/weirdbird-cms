Ext.define('WeirdbirdCMS.model.Structure', {
	extend: 'Ext.data.Model',

	fields: [
		{name:'id', type:'int'}, 
		{name:'active', type:'bool'}, 
		'position', 'title', 'description', 'user_name',
		{name:'layout_id', type:'int'}
	],
	
	validation: [
		{type: 'format', field: 'title', matcher: /lolthisdoesntworkatall(TODO)/ }
	]
});