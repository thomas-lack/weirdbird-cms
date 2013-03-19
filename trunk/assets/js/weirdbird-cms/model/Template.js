Ext.define('WeirdbirdCMS.model.Template', {
	extend: 'Ext.data.Model',

	fields: [
		'id', 
		{name:'active', type:'bool'}, 
		'name', 
		'standardlayout', 
		'description', 
		'folder_images', 
		'previewimage_filename', 
		'previewimage_description', 
		'layouts', 
		'modules', 
		'folder', 
		'folder_preview'
	]
});