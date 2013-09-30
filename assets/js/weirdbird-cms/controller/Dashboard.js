Ext.define('WeirdbirdCMS.controller.Dashboard', {
	extend: 'Ext.app.Controller',

	// since dashoard data is loaded via AJAX, we can buffer it for later use
	dashboardBuffer: null,

	stores: [],
	models: [],

	/**
	 * Handles the creation of an initial content view: the dashboard
	 */
	createDashboard: function() {
		if (this.dashboardBuffer !== null) {
			_cms.fillContentPanel({
				xtype: 'panel',
				bodyCls: 'content',
				border: false,
				html: this.dashboardBuffer
			});

			this.registerDashboardHandlers();
		} else {
			Ext.Ajax.request({
				url: 'cms/dashboard',
				success: function(response) {
					_cms.getController('Dashboard').dashboardBuffer = response.responseText;
					_cms.getController('Dashboard').createDashboard();
				},
				failure: function(response) {
					Ext.MessageBox.alert('Error', _cms.lang.dashboard.message.error + ' (Error code ' + response.status + ').');
				}
			});
		}
	},

	/**
	 * register clickable buttons for the dashboard
	 */
	registerDashboardHandlers: function() {
		if (_cms.debug) {
			console.log('registering dashboard handlers');
		}

		Ext.each(Ext.query('.dashboard-list > li'), function(domEl) {
			var el = Ext.get(domEl),
				urlSuffix = el.dom.attributes.href.value,
				clickFn = function() {
					_cms.updateNavigationMenu(urlSuffix);
					_cms.callerMapping(urlSuffix);
				};

			el.addClsOnOver('hover-dashboard');
			el.on('click', clickFn);
		});
	}
});