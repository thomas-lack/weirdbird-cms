// define a new model, because the standard treeview model does not contain the mapping_id field
Ext.define('WeirdbirdCMS.model.ArticleTreeNode', {
	extend: 'Ext.data.NodeInterface',

	fields: [
		'hrefTarget', 
		'id',
		'iconCls',
		'text',
		'leaf',
		'expanded',
		'children',
		'allowDrop'
	]
});