Ext.define('WeirdbirdCMS.model.File', {
	extend: 'Ext.data.Model',

	fields: [
		{name:'id', type:'int'}, 
		{name:'active', type:'bool'}, 
		'user_id', 
		'filename', 
		'type', 
		'description', 
		'link',
		{name:'creationdate', type:'date'}
	]
});