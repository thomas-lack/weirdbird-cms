// define a new model, because the standard treeview model does not contain the mapping_id field
Ext.define('WeirdbirdCMS.model.ArticleNode', {
	extend: 'Ext.data.Model',

	fields: [
		'mapping_id', 
		'id', 
		'text'
	],
	
	proxy: {
		type: 'localstorage'
	}
});