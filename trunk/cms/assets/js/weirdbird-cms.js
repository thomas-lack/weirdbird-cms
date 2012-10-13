var cms = {
	debug: true,
	init:	function(){
		$.blockUI.defaults.css.border = '3px solid #aaa';
		$.blockUI.defaults.css.backgroundColor = 'white';
		$.blockUI.defaults.css.width = '35px';
		$.blockUI.defaults.css.left = '48%';
		$.blockUI.defaults.message = '<img src="/assets/images/ajax-loader.gif"/>';
		//$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI); /* can be used to block the whole document on every ajax request */
		this.registerNavHandlers();
		this.registerDashboardHandlers();
	},
	registerNavHandlers: function(){
		if (this.debug) console.log('registering nav menu handlers');
		$('#navmenu > ul > li > a').each(function(){
			var el = $(this);
			var urlSuffix = el.attr('ajax');
			el.unbind();
			el.on('click', function(){
				cms.updateNavigationMenu(urlSuffix);
				
				$('#content').block();
				$.ajax({
					url: 'cms/' + urlSuffix,
					success: function(data){
						$('#content').html(data);
						if (urlSuffix == 'dashboard')
						{
							cms.registerDashboardHandlers();
						}
						if (urlSuffix == 'templates')
						{
							cms.populateTemplateGrid();
						}
						$('#content').unblock();
					},
					failure: function(){
						alert('Oops. An ajax error happened.');
						$('#content').unblock();
					}
				});
			});
		});
	},
	registerDashboardHandlers: function() {
		if (this.debug) console.log('registering dashboard handlers');
		$('.dashboard-list > li').each(function(){
			var el = $(this);
			var urlSuffix = el.attr('href');
			el.unbind();
			el.on('mouseenter', function(){
				$(this).removeClass('unhover-dashboard');
				$(this).addClass('hover-dashboard');
			});
			el.on('mouseleave', function(){
				$(this).addClass('unhover-dashboard');
			});
			el.on('click', function(){
				cms.updateNavigationMenu(urlSuffix);
				
				$('#content').block();
				$.ajax({
					url: 'cms/' + urlSuffix,
					success: function(data){
						$('#content').html(data);
						if (urlSuffix == 'templates')
						{
							cms.populateTemplateGrid();
						}
						$('#content').unblock();
					},
					failure: function(){
						alert('Oops. An ajax error happened.');
						$('#content').unblock();
					}
				});
			});
		});
	},
	updateNavigationMenu: function(categoryLink) {
		if (this.debug) console.log('resetting navigation menu to: ' + categoryLink);
		$('#navmenu > ul > li > a').removeClass('big bold');
		$('#navmenu > ul > li > span').remove();
		var el = $('#navmenu > ul > li > a[ajax=' + categoryLink + ']');
		el.addClass('big bold');
		el.parent().append('<span class="icon right very-big">=</span>');
	},
	populateTemplateGrid: function() {
		if (this.debug) console.log('populating template data grid');
		
		var sharableDataSource = new kendo.data.DataSource({
			pageSize: 3,
			transport: {
			read: {
				url: "cms/templates/data",
				dataType: "json"
			}
		}
		});
		
		$('#template-list').kendoGrid({
			dataSource: sharableDataSource,
			scrollable: false,
			pageable: true,
			columns: [{
				title: 'Activate',
				template: ''
				+'<p class="hidden" activeid="#=id#" isactive="#=active#"><span class="blue icon very-big">"</span> '
				+'This template is currently active.</p>'
				+'<button activate="#=id#" isactive="#=active#">Set active <span class="icon">=</span></button>'
			},{
				title: 'Description',
				template: ''
				+'<h2>#=name#</h2>'
				+'<p class="justified normal normal-lh">#=description#</p>'
				+'<h2>Layouts</h2>'
				+'<ul class="normal normal-lh">'
				+'#if (layouts.layout[1].length > 1){#'
				+'#for (var i=0;i<layouts.layout.length;i++){#'
				+'<li><span class="icon green">&Atilde;</span> #=layouts.layout[i]#</li>'
				+'#}#'
				+'#} else {#'
				+'<li><span class="icon green">&Atilde;</span> #=layouts.layout#</li>'
				+'#}#'
				+'</ul>'
				+'<h2>Modules</h2>'
				+'<ul class="normal normal-lh">'
				+'#if (modules.module[1].length > 1){#'
				+'#for (var i=0;i<modules.module.length;i++){#'
				+'<li><span class="icon green">&Atilde;</span> #=modules.module[i]#</li>'
				+'#}#'
				+'#} else {#'
				+'<li><span class="icon green">&Atilde;</span> #=modules.module#</li>'
				+'#}#'
				+'</ul>'
			},{
				title: 'Preview',
				template: ''
				+'<img src="#=templatefolder#/#=preview.folder#/#=preview.previewimage.filename#" />'
				+'<p class="sans-serif very-small uppercase dark-gray normal-lh">#=preview.previewimage.imagedescription#</p>'
			}],
			dataBound: function(e){
				if (this.debug) console.log("data was bound to the grid / registering button handlers");
				cms.updateTemplateGridInfo();
				$('table > tbody > tr > td > button').each(function(){
					$(this).on('click', function(){
						var dataId = $(this).attr('activate');
						
						$('#content').block();
						$.ajax({
							url: 'cms/templates/settemplate/' + dataId,
							success: function(data){
								cms.updateTemplateGridInfo(dataId);
								$('#content').unblock();
							},
							failure: function(){
								alert('Oops. An ajax error happened.');
								$('#content').unblock();
							}
						});
					});
				});
			}
		});
	},
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
	}
}

$(document).ready(function(){
	cms.init();
});