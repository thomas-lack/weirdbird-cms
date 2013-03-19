Ext.define('WeirdbirdCMS.model.Layout', {
	extend: 'Ext.data.Model',

	fields: [
		'id', 
		'template_id', 
		'name', 
		'description', 
		'view', 
		'columns'
	]
});