Ext.define('WeirdbirdCMS.view.System', {
	extend: 'Ext.form.Panel',

	requires: [
		'Ext.form.FieldSet',
		'Ext.form.field.ComboBox',
		'Ext.form.field.Display',
		'Ext.form.field.Text',
		'Ext.button.Button'
	],

	id: 'systemForm',
	url: 'cms/system',
	bodyCls: 'content',
	bodyPadding: 15,
	border: false,
	fieldDefaults: {
		msgTarget: 'side',
		labelWidth: 150,
		margin: '0 0 20px 0'
	},

	tbar: [{
		text:'<i class="icon-save big"></i>&nbsp;' + _cms.lang.system.button.save,
		handler: function() {
			_cms.getController('System').onSaveBtn();
		}
	}],

	items: [{
		xtype: 'fieldset',
		title: _cms.lang.system.form.title,
		defaultType: 'textfield',
		defaults: {
			width:500
		},
		items: [{
			fieldLabel: _cms.lang.system.form.companyname,
			name: 'companyname',
			allowBlank: true,
			id: 'systemFormCompanyName'
		},{
			fieldLabel: _cms.lang.system.form.additionalinfo,
			name: 'info',
			allowBlank: true,
			id: 'systemFormInfo'
		},{
			fieldLabel: _cms.lang.system.form.address,
			name: 'address',
			allowBlank: true,
			id: 'systemFormAddress'
		},{
			fieldLabel : _cms.lang.system.form.contactemail,
			name: 'email',
			allowBlank: false,
			vtype: 'email',
			id: 'systemFormEmail'
		},{
			xtype: 'displayfield',
			id: 'systemBrandImage',
			fieldLabel: _cms.lang.system.form.brand,
			height: 60,
			imageId: '',
			allowBlank: true
		},{
			xtype: 'button',
			height: 20,
			width: 120,
			margin: '-10 0 15 155',
			text: _cms.lang.system.form.brandBtn,
			handler: function() {
				_cms.getController('System').onSelectImageBtn();
			}
		},{
			name: 'language',
			xtype: 'combobox',
			fieldLabel: _cms.lang.system.form.language,
			id: 'languageComboBox',
			store: Ext.getStore('Languages'),
			emptyText: _cms.lang.system.form.emptyText,
			displayField: 'name',
			valueField: 'id',
			queryMode: 'local'
		}]
	},{
		xtype: 'fieldset',
		title: _cms.lang.system.form2.title,
		defaultType: 'panel',
		id: 'systemFormRevision'
	}]
});