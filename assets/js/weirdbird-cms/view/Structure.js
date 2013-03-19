Ext.define('WeirdbirdCMS.view.Structure', {
	extend: 'Ext.form.Panel',

	requires: [
		'Ext.ux.CheckColumn',
		'Ext.layout.container.Column',
		'Ext.layout.container.VBox',
		'Ext.form.FieldSet',
		'Ext.form.field.Display',
		'Ext.form.field.Text',
		'Ext.form.field.TextArea'
	],

	id: 'structuresForm',
	title: _cms.lang.structures.title,
	layout: 'column',
	bodyCls: 'content',
	border: false,
	items: [
	// left gridpanel
	{
		columnWidth: 0.60,
		height: Ext.getCmp('navmenu').getHeight(),
		xtype: 'gridpanel',
		id: 'categoriesGrid',
		title: _cms.lang.structures.grid.title,
		plugins: [ _cms.getController('Structure').rowEditing ],
		store: Ext.getStore('Structures'),
		border: false,
		columns: [
	        { text: '#',  dataIndex: 'position', width:30, editor:{ allowBlank:false }},
	        { text: _cms.lang.structures.grid.active, dataIndex: 'active', width: 50, xtype: 'checkcolumn',
	        	editor: {xtype: 'checkbox', cls: 'x-grid-checkheader-editor'}
	       	},
	        { text: _cms.lang.structures.grid.titleCol, dataIndex: 'title', editor:{ allowBlank:false } },
	        { text: _cms.lang.structures.grid.description, dataIndex: 'description', flex: 1, editor:{ allowBlank:true } },
	        { text: _cms.lang.structures.grid.user, dataIndex: 'user_name', width: 60}
	    ],
	    tbar: [{
	    	text: '<span class="icon very-big">@</span> ' + _cms.lang.structures.button.add,
	    	handler: function() {
	    		_cms.getController('Structure').onAddBtn();
	    	}
	    },'-',{
	    	text: '<span class="icon very-big">A</span> ' + _cms.lang.structures.button.remove,
	    	itemId: 'deleteCategory',
	    	handler: function() {
	    		_cms.getController('Structure').onRemoveBtn();
	    	}
	    }],
	    listeners: {
            selectionchange: function(model, records) {
                _cms.getController('Structure').onSelectionChange(model, records);
            }
        }
	},
	// right panel
	{
		columnWidth: 0.4,
        layout: {
			type: 'vbox',
			align: 'stretch',
			padding: 10
		},
		border: false,
		items: [{
			// upper formpanel (layout / modules)
			id: 'layoutModuleFormPanel',
            xtype: 'fieldset',
            title: _cms.lang.structures.form.title,
            defaultType: 'combo',
            border: true,
            defaults: {
                width: 360,
                labelWidth: 90
            },
			items:[{
				fieldLabel: _cms.lang.structures.form.layout,
				id: 'layoutsComboBox',
				store: Ext.getStore('Layouts'),
				emptyText: _cms.lang.structures.form.emptyText,
				displayField: 'description',
				valueField: 'id',
				queryMode: 'local',
				listeners: {
					change: function(cmp, newValue, oldValue) {
						_cms.getController('Structure').onComboChange(cmp, newValue, oldValue);
					}
				}
			}]
		},{
			// lower formpanel (images / description texts)
			id: 'layoutOptionalFormPanel',
			title: _cms.lang.structures.form2.title,
			xtype: 'fieldset',
			autoScroll: true,
			border: true,
			defaults: {
				width: 360,
				labelWidth: 90,
				height: 60
			},
			defaultType: 'textareafield',
			items: [{
				xtype: 'displayfield',
				id: 'layoutsOptionalBackground',
				fieldLabel: _cms.lang.structures.form2.background,
				height: 60,
				imageId: ''
			},{
				xtype: 'button',
				height: 20,
				width: 120,
				margin: '0 0 5 95',
				text: _cms.lang.structures.form2.backgroundBtn,
				handler: function() {
					_cms.getController('Structure').onSelectImageBtn();
				}
			},{
				fieldLabel: _cms.lang.structures.form2.backgroundDescription,
				id: 'layoutsOptionalBackgroundDescription',
				xtype: 'textfield',
				height: 20
			},{
				fieldLabel: _cms.lang.structures.form2.headline1,
				id: 'layoutsOptionalHeadline1'
			},{
				fieldLabel: _cms.lang.structures.form2.headline2,
				id: 'layoutsOptionalHeadline2'
			},{
				fieldLabel: _cms.lang.structures.form2.headline3,
				id: 'layoutsOptionalHeadline3'
			},{
				xtype: 'button',
				height: 20,
				width: 265,
				text: _cms.lang.structures.form2.saveBtn,
				margin: '10 0 0 95',
				handler: function() {
					_cms.getController('Structure').onSaveBtn();
				}
			}]
		}]
	}]
});