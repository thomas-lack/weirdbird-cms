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
	
	/**
	* set which content shall be loaded via ajax by clicking on a menu button
	*/
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
							cms.populateTemplatesGrid();
						}
						if (urlSuffix == 'structures')
						{
							cms.populateStructuresGrid();
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
	
	/**
	* register clickable buttons for the dashboard
	*/
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
	
	/*
	* Change color of the navigation menu on the fly
	*/
	updateNavigationMenu: function(categoryLink) {
		if (this.debug) console.log('resetting navigation menu to: ' + categoryLink);
		$('#navmenu > ul > li > a').removeClass('big bold');
		$('#navmenu > ul > li > span').remove();
		var el = $('#navmenu > ul > li > a[ajax=' + categoryLink + ']');
		el.addClass('big bold');
		el.parent().append('<span class="icon right very-big">=</span>');
	},
	
	/**
	* Load template data into the template grid
	*/
	populateTemplatesGrid: function() {
		if (this.debug) console.log('populating template data grid');
		
		var sharableDataSource = new kendo.data.DataSource({
			//pageSize: 3,
			transport: {
			read: {
				url: "cms/templates/data",
				dataType: "json"
			}
		}
		});
		
		$('#template-grid').kendoGrid({
			dataSource: sharableDataSource,
			toolbar: [{
				text: 'Import all templates',
				className: 'tplimport',
				imageClass: 'k-add'
			}],
			scrollable: false,
			pageable: false,
			columns: [{
				title: 'Preview',
				width: 150,
				template: ''
					+'<img src="#=folder#/#=folder_preview#/#=previewimage_filename#" />'
					+'<p class="sans-serif very-small uppercase dark-gray normal-lh">#=previewimage_description#</p>'
			},{
				title: 'Description',
				template: ''
				+'<h2>#=name#</h2>'
				+'<p class="justified normal normal-lh">#=description#</p>'
				+'<h2>Layouts</h2>'
				+'<ul class="normal normal-lh">'
				+'#for (var i=0;i<layouts.length;i++){#'
				+'<li><span class="icon green">&Atilde;</span> #=layouts[i].description#</li>'
				+'#}#'
				+'</ul>'
				+'<h2>Modules</h2>'
				+'<ul class="normal normal-lh">'
				+'#for (var i=0;i<modules.length;i++){#'
				+'<li><span class="icon green">&Atilde;</span> #=modules[i].description#</li>'
				+'#}#'
				+'</ul>'
			},{
				title: 'Activate',
				width: 70,
				template: ''
				+'<p class="hidden" activeid="#=id#" isactive="#=active#"><span class="blue icon very-big">"</span> '
				+'This template is currently active.</p>'
				+'<button activate="#=id#" isactive="#=active#">Set active <span class="icon">=</span></button>'
			},],
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

		//add click handler to the custom toolbar button
		$('.tplimport').click(function(){
			$('#content').block();
			$.ajax({
				url: 'cms/templates/import',
				success: function(data){
					$('#template-grid').data('kendoGrid').dataSource.read(); 
					$('#content').unblock();
				},
				failure: function(){
					alert('Oops. An ajax error happened.');
					$('#content').unblock();
				}
			});
		});
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
	* Fill the structures grid with data
	*/
	populateStructuresGrid: function() {
		if (this.debug) console.log('populating structures data grid');
		
		var data = new kendo.data.DataSource({
			transport: {
				read: {
					url: 'cms/structures/data',
					dataType: 'json'
				},
				update: {
					url: function(params){
						return 'cms/structures/update/' + params.id;
					},
					type: 'POST'
				},
				destroy: {
					url: function(params){
						console.log('destroy');
						return 'cms/structures/destroy/' + params.id;
					},
					type: 'POST'
				},
				create: {
					url: 'cms/structures/create',
					type: 'POST',
					complete: function(e) {
						// refresh grid after db update
						$("#structures-grid").data("kendoGrid").dataSource.read(); 
					}
				},
				// map the parameters we give to the backend according to the used
				// operation (e.g. read out the position for new entries)
				parameterMap: function(options, operation) {
					return {
						id: options.id,
						position: (operation == 'create') ? $('.k-grid-content tr').length : options.position,
						active: options.active,
						title: options.title,
						description: options.description,
						format: options.format
					}
				}
			},
			schema: {
				data: 'data',
				model: {
					id: 'id',
					fields: {
						id: {editable:false, nullable:false, defaultValue: -1},
						position: {editable:false, validation: {required:true}},
						active: {type:'boolean'},
						title: {type:'string', validation: {
							required:true,
							custom: function(input) {
								input.attr('data-custom-msg', 
									'The title can only contain letters A-Z, a-z, underscore _ or Numbers 0-9.');
								// check for a-zA-Z0-9_
								return (input.val().match(/^[a-zA-Z0-9_]+$/g));
							}
						}},
						description: {type:'string'},
						format: {type:'string', validation: {required:true}}
					}
				}
			}
		});
		
		var testData = [
			{ 'value': '2col', 'text': 'omnom 2col' },
			{ 'value': '3col', 'text': 'offoff 3col'}
		];

		$('#structures-grid').kendoGrid({
			dataSource: data,
			toolbar: ['create', 'save', 'cancel'],
			sortable: false,
			filterable: false,
			scrollable: true,
			selectable: true,
			editable: true, // 'inline' with editable: true the delete command is not working!
			columns: [
				{field:'position', title:'#', width:'50'},
				{field:'active', title:'Active?', width:'70',
					template: '<input type="checkbox" # if(active){# checked #}#/>'
				},
				{field:'title', title:'Title'},
				{field:'description', title:'Description'},
				{field:'format', title:'Type', values: testData},
				{command:'destroy', title:''}
			]
		});
	}
}


$(document).ready(function(){
	cms.init();
});