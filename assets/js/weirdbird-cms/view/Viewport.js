Ext.define('WeirdbirdCMS.view.Viewport', {
	extend: 'Ext.container.Viewport',

	requires: [
		'Ext.layout.container.Border'
	],

	layout: 'border',

	items: [{
		region: 'north',
		html: '<div class="branding-logo"><img class="left" src="/assets/images/wb-cms-logo.png"/></div>'
			+ '<span class="sans-serif headline dark-gray" id="headline">weirdbird cms</span>'
			+ '<span id="headline-description">Dashboard</span>'
			+ '<span class="right top-padding-10"><a href="cms/user/logout">' + _cms.lang.top.logout + ' '
			+ '<i class="icon-off dark-gray"></i></a>'
			+ '</span>'
			+ '<span class="right dark-gray right-padding-10 top-padding-10">'
			+ '<i class="icon-user dark-gray"></i> ' + _cms.username
			+ '</span>',
		bodyCls: 'title',
		height: 70
	}, {
		region: 'west',
		html: ''
			+ '<ul class="sans-serif">'
			+ '<li><a href="#" ajax="dashboard" class="active"><i class="icon-dashboard"></i></a></li>'
			+ '<li><a href="#" ajax="templates"><i class="icon-eye-open"></i></a></li>'
			+ '<li><a href="#" ajax="structures"><i class="icon-list-ol"></i></a></li>'
			+ '<li><a href="#" ajax="articles"><i class="icon-edit"></i></a></li>'
			+ '<li><a href="#" ajax="filemanager"><i class="icon-folder-open-alt"></i></a></li>'
			+ '<li><a href="#" ajax="user"><i class="icon-group"></i></a></li>'
			+ '<li><a href="#" ajax="system"><i class="icon-cogs"></i></a></li>'
			+ '</ul>',
		bodyCls: 'navmenu',
		id: 'navmenu',
		width: 80,
		layout: 'fit', // bugfix - otherwise the size is not always calculated correctly by the browser
	}, {
		region: 'center',
		bodyCls: 'content',
		id: 'contentPanel',
		layout: 'fit',
		border: false
	}, {
		region: 'south',
		html: '<span class="sans-serif small">'
			+ _cms.lang.bottom.created
			+ ' '
			+ _cms.lang.bottom.moreinfo
			+ ' '
			+ '<a href="https://github.com/thomas-lack/weirdbird-cms">'
			+ _cms.lang.bottom.moreinfo2
			+ '</a>.'
			+ '</span>',
		bodyCls: 'bottombar'
	}]
});
