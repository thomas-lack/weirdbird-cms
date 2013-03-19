Ext.define('WeirdbirdCMS.controller.User', {
	extend: 'Ext.app.Controller',

	requires: [
		'Ext.Msg',
		'Ext.window.Window',
		'Ext.form.Panel',

		'Ext.grid.plugin.RowEditing'
	],

	stores: [ 'Users' ], // store is on autoload
	models: [ 'User' ],

	rowEditing: Ext.create('Ext.grid.plugin.RowEditing', {
        clicksToMoveEditor: 1,
        autoCancel: false
    }),

    /**
	 * Creates a new user-view and displays it at the main content panel
	 */
	populateUsersGrid: function() {
		if (_cms.debug) console.log('populating users grid');

		// instantiate the view
		if ( ! Ext.isDefined(Ext.getCmp('usersGrid')) )
			Ext.create('WeirdbirdCMS.view.User');

		// make "delete file" button clickable if a row is selected
		Ext.getCmp('usersGrid').getSelectionModel().on('selectionchange', function(selModel, selections){
	        // at least one user has to stay in the system
	        Ext.getCmp('usersGrid').down('#deleteUser').setDisabled(selections.length === 0 
	        	|| Ext.getStore('Users').count() === 1);
	        Ext.getCmp('usersGrid').down('#changePassword').setDisabled(selections.length === 0);
	        Ext.getCmp('usersGrid').down('#resetPassword').setDisabled(selections.length === 0);
	    });
		
		// add view to viewport
		_cms.fillContentPanel(Ext.getCmp('usersGrid'));
	},

	/**
	 * Event handler: add button pressed
	 */
	onAddBtn: function() {
		Ext.create('Ext.window.Window', {
		    id: 'newUserWindow',
		    title: _cms.lang.user.window.title,
		    width: 500,
		    
		    items: [{
		    	xtype: 'form',
		    	id: 'user-form',
		    	border: false,
		    	bodyCls: 'content-extjs',
		    	margin: 10,
		    	defaults: {
			    	anchor: '100%',
			    	allowBlank: false,
			    	msgTarget: 'side',
			    	labelWidth: 75
			    },
			    items: [{  
			    	xtype: 'textfield',
			    	name: 'username',
			    	fieldLabel: _cms.lang.user.window.name
			    },{
			    	xtype: 'textfield',
			    	name: 'email',
			    	vtype: 'email',
			    	fieldLabel: _cms.lang.user.window.email
		    	}]
		    }],

		    buttons: [{
		    	text: _cms.lang.user.window.save,
		    	handler: function() {
		    		var form = Ext.getCmp('user-form').getForm();
		    		if(form.isValid()){
		    			// check if no other user has the new name / email address before
		    			// sending the data to the backend
		    			var dataAlreadySet = false;
		    			var values = form.getValues();
		    			
		    			Ext.getStore('Users').each(function(record, index){
		    				if (record.get('username') == values.username 
		    					|| record.get('email') == values.email)
		    					dataAlreadySet = true;
		    			});
		    			
		    			if (!dataAlreadySet)
		    			{
		    				form.submit({
			    				url: 'cms/user/create',
			    				waitMsg: _cms.lang.user.button.waitMsg,
			    				success: function(fp, o) {
			    					Ext.getCmp('newUserWindow').close();
			    					Ext.MessageBox.alert(_cms.lang.user.window3.title,cms.lang.user.window3.message);
			    				},
			    				failure: function(fp,o) {
			    					Ext.getCmp('newUserWindow').close();
			    				}
			    			});	
		    			}
		    			else
		    			{
		    				Ext.MessageBox.alert(_cms.lang.user.window5.title, cms.lang.user.window5.message);
		    			}
		    		}
		    	}
		    },{
		    	text: _cms.lang.user.window.reset,
		    	handler: function() {
		    		Ext.getCmp('user-form').getForm().reset();
		    	}
		    }]
		}).show();
	},

	/**
	 * Event handler: delete button pressed
	 */
	onDeleteBtn: function() {
		Ext.Msg.show({
			title: _cms.lang.user.message.title,
			msg: _cms.lang.user.message.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.WARNING,
			fn: function(btn) {
				if (btn == 'yes') {
					var record = Ext.getCmp('usersGrid').getSelectionModel().getSelection()[0];
					Ext.getStore('Users').remove(record);
				}
			}
		});
	},

	/**
	 * Event handler: reset password button pressed
	 */
	onResetPasswordBtn: function() {
		Ext.Msg.show({
			title: _cms.lang.user.window4.title,
			msg: _cms.lang.user.window4.message,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.WARNING,
			fn: function(btn) {
				if (btn == 'yes') {
					var record = Ext.getCmp('usersGrid').getSelectionModel().getSelection()[0];
					Ext.Ajax.request({
						url: 'cms/user/silentresetpassword',
						params: {
							id: record.get('id'),
							email: record.get('email'),
							username: record.get('username')
						},
						success: function(response) {
							Ext.MessageBox.alert('Status', _cms.lang.user.window4.success);
						},
						failure: function(response) {
							Ext.MessageBox.alert('Error', _cms.lang.user.window4.error);
						}
					});
				}
			}
		});
	},

	/**
	 * Event handler: change password button pressed
	 */
	onChangePasswordBtn: function() {
		Ext.create('Ext.window.Window', {
		    id: 'changePasswordWindow',
		    title: _cms.lang.user.window2.title,
		    width: 500,
		    
		    items: [{
		    	xtype: 'form',
		    	id: 'changepassword-form',
		    	border: false,
		    	bodyCls: 'content-extjs',
		    	margin: 10,
		    	defaults: {
			    	anchor: '100%',
			    	allowBlank: false,
			    	msgTarget: 'side',
			    	labelWidth: 140
			    },
			    items: [{  
			    	xtype: 'textfield',
			    	name: 'currentpassword',
			    	inputType: 'password',
			    	fieldLabel: _cms.lang.user.window2.current
			    },{
			    	xtype: 'textfield',
			    	name: 'newpassword1',
			    	id: 'newpassword1-form',
			    	inputType: 'password',
			    	fieldLabel: _cms.lang.user.window2.new1
		    	},{
		    		xtype: 'textfield',
		    		name: 'newpassword2',
		    		inputType: 'password',
		    		fieldLabel: _cms.lang.user.window2.new2,
		    		validator: function(value) {
		    			if (value == Ext.getCmp('newpassword1-form').getValue())
		    				return true;
		    			else
		    				return _cms.lang.user.window2.error;
		    		}
		    	},{
		    		xtype: 'hiddenfield',
		    		name: 'id',
		    		value: Ext.getCmp('usersGrid').getSelectionModel().getSelection()[0].get('id')
		    	}]
		    }],

		    buttons: [{
		    	text: _cms.lang.user.window2.save,
		    	handler: function() {
		    		var form = Ext.getCmp('changepassword-form').getForm();
		    		if(form.isValid()){
		    			form.submit({
		    				url: 'cms/user/changepassword',
		    				waitMsg: _cms.lang.user.button.waitMsg2,
		    				success: function(fp, o) {
		    					Ext.getCmp('changePasswordWindow').close();
		    				}
		    			});
		    		}
		    	}
		    },{
		    	text: _cms.lang.user.window2.reset,
		    	handler: function() {
		    		Ext.getCmp('changepassword-form').getForm().reset();
		    	}
		    }]
		}).show();
	}
});