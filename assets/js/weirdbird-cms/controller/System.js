Ext.define('WeirdbirdCMS.controller.System', {
	extend: 'Ext.app.Controller',

	requires: [
		'WeirdbirdCMS.util.SelectImageWindow',
		'Ext.Ajax'
	],

	stores: [ ],
	models: [ ],

	populateSystemPanel: function() {
		if (_cms.debug) console.log('populating system panel');

		// create new view if none is existent
		if ( ! Ext.isDefined(Ext.getCmp('systemForm')) );
			Ext.create('WeirdbirdCMS.view.System');

		// get system setting data from the backend
		this.load();

		// display view in the main content panel
		_cms.fillContentPanel(Ext.getCmp('systemForm'));
	},

	/**
	 * Data binding method - retrieves system settings from the backend
	 * and binds them to previously instantiated view
	 */
	load: function() {
		Ext.MessageBox.wait(_cms.lang.system.message2.waitMsg);

		Ext.Ajax.request({
			url: 'cms/system/read',
			success: function(response) {
				var r = Ext.JSON.decode(response.responseText);
				
				// update the form fields
				if (r.companyname != null)
					Ext.getCmp('systemFormCompanyName').setValue(r.companyname);
				
				if (r.info != null)
					Ext.getCmp('systemFormInfo').setValue(r.info);
				
				if (r.address != null)
					Ext.getCmp('systemFormAddress').setValue(r.address);
				
				if (r.email != null)
					Ext.getCmp('systemFormEmail').setValue(r.email);
				
				if (r.brandimagepath != null && Ext.typeOf(r.brandimagepath) == 'string'
					&& r.brandimage != null && r.brandimage != '') {
					Ext.getCmp('systemBrandImage').setValue('<img src="' + r.brandimagepath + '">');
					Ext.getCmp('systemBrandImage').imageId = r.brandimage;
				}
				else
					Ext.getCmp('systemBrandImage').setValue('<img src="/assets/images/no-image-available.png">');

				if (r.language != null)
					Ext.getCmp('languageComboBox').setValue(r.language);

				// update the revision panel (if reading from google was possible)
				if (r.revision.error == null)
				{
					var out = '<div id="systeminfo"><span class="icon very-big green">"</span> '
								+ _cms.lang.system.message2.success+'</div>';
					
					if (r.revision.system != r.revision.current)
						out = '<div id="systeminfo">'
							+ '<p><span class="icon very-big red">8</span> '
							+ _cms.lang.system.message2.error2
							+ ' '
							+ _cms.lang.system.message2.error3
							+ ' <a href="http://code.google.com/p/weirdbird-cms/source/list">'
							+ _cms.lang.system.message2.error4
							+'</a> '
							+ _cms.lang.system.message2.error5
							+ '</p>'
							+ '<p>&nbsp;</p>'
							+ '<p> '
							+ _cms.lang.system.message2.error6
							+ ' '
							+ r.revision.system
							+ '<br/>'
							+ _cms.lang.system.message2.error7 
							+ ' '
							+ r.revision.current + ' from ' + r.revision.creationdate
							+ '</p></div>';
				}
				else // otherwise the backend results in an error message (not able to read from google)
				{
					var out = '<div id="systeminfo">'
						+ '<p><span class="icon very-big red">8</span> '
						+ '<p>' + r.revision.error + '</p><br/>'
						+ '<p> '
						+ _cms.lang.system.message2.error6
						+ ' '
						+ r.revision.system
						+ '</p></div>';
				}
				Ext.getCmp('systemFormRevision').add({html:out});
				Ext.MessageBox.updateProgress(1);
				Ext.MessageBox.hide();
			},
			failure: function(response) {
				Ext.MessageBox.hide();
				Ext.MessageBox.alert('Error', _cms.lang.system.message2.error + ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Event Handler: save button pressed
	 */
	onSaveBtn: function() {
		var field = Ext.getCmp('systemFormEmail');
					
		// if the combobox was not yet changed, the id field is not set - 
		// we have to do this manually
		var languageId = Ext.getCmp('languageComboBox').getValue();
		if (!Ext.isNumeric(languageId))
		{
			languageId = Ext.getStore('Languages').findRecord('name', languageId).get('id');
		}
			
		if (field.validate()) {
			Ext.Ajax.request({
				url: 'cms/system/update',
				params: {
					email: field.getValue(),
					language: languageId,
					companyname: Ext.getCmp('systemFormCompanyName').getValue(),
					address: Ext.getCmp('systemFormAddress').getValue(),
					info: Ext.getCmp('systemFormInfo').getValue(),
					brandimage: Ext.getCmp('systemBrandImage').imageId
				},
				success: function(response) {
					Ext.MessageBox.alert('Status', '<p>' + _cms.lang.system.message.success1 + '</p>'
						+ '<p>' + _cms.lang.system.message.success2 + '</p>');
				},
				failure: function(response) {
					Ext.MessageBox.alert('Error', _cms.lang.system.message.error 
						+ ' (Error code ' + response.status + ').');
				}
			});
		}
	},

	/**
	 * Event handler: Select image button pressed (optional settings form panel)
	 */
	onSelectImageBtn: function() {
		Ext.create('WeirdbirdCMS.util.SelectImageWindow').show('systemBrandImage');
	}
});