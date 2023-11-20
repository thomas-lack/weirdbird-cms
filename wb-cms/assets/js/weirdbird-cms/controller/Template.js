Ext.define('WeirdbirdCMS.controller.Template', {
	extend: 'Ext.app.Controller',

	requires: [
		'Ext.Msg',
		'Ext.Ajax'
	],

	stores: [
		'Templates',
		'Layouts',
		'Modules'
	],
	models: [
		'Template',
		'Layout',
		'Module'
	],
	
	/**
	* Load template data into the template grid
	*/
	populateTemplatesGrid: function() {
		if (_cms.debug) console.log('populating template data grid');

		if ( ! Ext.isDefined(Ext.getCmp('templatesGrid')) )
			Ext.create('WeirdbirdCMS.view.Template');

		// make "set active" button clickable if a row is selected
		Ext.getCmp('templatesGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        Ext.getCmp('templatesGrid').down('#activateTemplate').setDisabled(selections.length === 0);
	    });

	    // update the content panel
	    _cms.fillContentPanel(Ext.getCmp('templatesGrid'));
	},

	/**
	* Show "set active" button in the template grid, only if the 
	* template is not active currently
	*/
	updateTemplateGridInfo: function(dataId){
		$('p.hidden').hide();
		$('button').show();
		if (dataId != null)
		{
			$('p.hidden[activeid=' + dataId + ']').show();
			$('button[activate=' + dataId + ']').hide();
		}
		else
		{
			$('button[isactive=1]').hide();
			$('p.hidden[isactive=1]').show();
		}
	},

	/**
	 * Event handler: import button was pressed
	 */
	onImportBtn: function() {
		Ext.Msg.show({
			title: _cms.lang.templates.message.title,
			msg: _cms.lang.templates.message.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.WARNING,
			fn: function(btn) {
				if (btn == 'yes') {
					Ext.Ajax.request({
						url: 'cms/templates/import',
						success: function() {
							Ext.MessageBox.alert('Status', _cms.lang.templates.message.success);
							Ext.getStore('Templates').load();
						}
					});
				}
			}
		});
	},

	/**
	 * Event handler: activate template button was pressed
	 */
	onActivateBtn: function() {
		var selection = Ext.getCmp('templatesGrid').getView().getSelectionModel().getSelection()[0];
		Ext.Ajax.request({
			url: 'cms/templates/settemplate/' + selection.data.id,
			success: function() {
				Ext.MessageBox.alert('Status', _cms.lang.templates.message2.success 
					+ ' <i>' + selection.data.name + '</i>');
				
				// reload all affected Stores
				Ext.getStore('Templates').load();
				Ext.getStore('Layouts').load();
				Ext.getStore('Modules').load();
			}
		});
	}
});