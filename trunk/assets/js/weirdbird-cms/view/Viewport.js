Ext.define('WeirdbirdCMS.view.Viewport', {
	extend: 'Ext.container.Viewport',

	requires: [
		'Ext.layout.container.Border'
	],

	layout: 'border',

	items: [{
		region: 'north',
		html: '<img class="left" src="/assets/images/logo.png"/>'
			+ '<span class="serif headline dark-gray">weirdbird cms</span>'
			+ '<span class="right"><a href="cms/user/logout">' + _cms.lang.top.logout + ' '
			+ '<span class="icon big dark-gray icon-space-top">v</span></a>'
			+ '</span>'
			+ '<span class="right right-padding-10">'
			+ '<span class="icon big dark-gray icon-space-top">L</span> ' + _cms.username
			+ '</span>',
		bodyCls: 'title',
		border: false
	}, {
		region: 'west',
		html: '<span class="sans-serif uppercase very-small gray">'+_cms.lang.nav.headline+'</span>'
			+ '<ul class="sans-serif">'
			+ '<li><a href="#" ajax="dashboard" class="big bold">'+_cms.lang.nav.dashboard+'<span class="icon right very-big">=</span></a></li>'
			+ '<li><a href="#" ajax="templates">'+_cms.lang.nav.templates+'</a></li>'
			+ '<li><a href="#" ajax="structures">'+_cms.lang.nav.structures+'</a></li>'
			+ '<li><a href="#" ajax="articles">'+_cms.lang.nav.articles+'</a></li>'
			+ '<li><a href="#" ajax="filemanager">'+_cms.lang.nav.filemanager+'</a></li>'
			+ '<li><a href="#" ajax="user">'+_cms.lang.nav.user+'</a></li>'
			+ '<li><a href="#" ajax="system">'+_cms.lang.nav.system+'</a></li>'
			+ '</ul>',
		bodyCls: 'navmenu',
		id: 'navmenu',
		width: 200,
		layout: 'fit', // bugfix - otherwise the size is not always calculated correctly by the browser
		border: false
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
			+ '<a href="http://code.google.com/p/weirdbird-cms/">'
			+ _cms.lang.bottom.moreinfo2
			+ '</a>.'
			+ '</span>',
		bodyCls: 'bottombar',
		border: false
	}]
});