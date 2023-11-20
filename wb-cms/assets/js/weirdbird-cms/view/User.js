Ext.define('WeirdbirdCMS.view.User', {
	extend: 'Ext.grid.Panel',

	requires: [],

	id: 'usersGrid',
    bodyCls: 'content',
    border: false,
    store: Ext.getStore('Users'),
    
    plugins: [ _cms.getController('User').rowEditing ],

    columns: [
   			{ text: _cms.lang.user.grid.name, dataIndex: 'username', width: 150, editor:{ allowBlank:false } },
   			{ text: _cms.lang.user.grid.email, dataIndex: 'email', flex: 1, editor:{ allowBlank:false } },
   			{ text: _cms.lang.user.grid.roles, dataIndex: 'roles', width: 100},
   			{ text: _cms.lang.user.grid.logins, dataIndex: 'logins', width: 80 },
   			{ text: _cms.lang.user.grid.lastlogin, dataIndex: 'last_login', xtype:'datecolumn', format: 'd.m.Y' }
	],

	tbar: [{
    	text: '<i class="icon-user big"></i>&nbsp;' + _cms.lang.user.button.add,
    	handler: function() {
    		_cms.getController('User').onAddBtn();
    	}
    },'-',{
    	text: '<span class="icon-stack"><i class="icon-user"></i><i class="icon-ban-circle icon-stack-base red"></i></span>&nbsp;' + _cms.lang.user.button.delete,
    	disabled: true,
    	itemId: 'deleteUser',
    	handler: function() {
    		_cms.getController('User').onDeleteBtn();
    	}
    },'-',{
    	text: '<i class="icon-eraser big"></i>&nbsp;' + _cms.lang.user.button.reset,
    	disabled: true,
    	itemId: 'resetPassword',
    	handler: function() {
    		_cms.getController('User').onResetPasswordBtn();
    	}
     },'-',{
     	text: '<i class="icon-exchange big"></i>&nbsp;' + _cms.lang.user.button.change,
    	disabled: true,
    	itemId: 'changePassword',
    	handler: function() {
    		_cms.getController('User').onChangePasswordBtn();
    	}
    }]
});