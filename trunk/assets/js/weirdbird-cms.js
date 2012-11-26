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
	* Helper method to provide functionality of module loading depending on the 
	* url suffix of the corresponding ajax call
	* (see registerNavHandlers() or registerDashboardHandlers())
	*/
	callerMapping: function(module) {
		switch (module) {
			case 'dashboard' : 
				cms.registerDashboardHandlers();
				break;
			case 'templates' :
				cms.populateTemplatesGrid();
				break;
			case 'structures' :
				cms.populateStructuresGrid();
				break;
			case 'articles' :
				cms.populateModuleSelectionGrid();
				cms.populateArticleEditingForm();
				break;
			default:
				cms.registerDashboardHandlers();
		}
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
						cms.callerMapping(urlSuffix);
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
						cms.callerMapping(urlSuffix);
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
		
		var structData = new kendo.data.DataSource({
			autoSync: false,
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
						position: (operation == 'create') ? '' + $('.k-grid-content tr').length : options.position,
						active: '' + options.active,
						title: options.title,
						description: options.description,
						layout: options.layout
					}
				}
			},
			schema: {
				model: {
					id: 'id',
					fields: {
						id: {editable:false, nullable:false, defaultValue: -1},
						position: {editable:false},
						active: {type:'string'},
						title: {type:'string', validation: {
							required:true,
							titleCheckNoSpacesOrExtraChars: function(input) {
								// check for a-zA-Z0-9_
								var ret;
								if (input.attr('name') == 'title') {
									ret = input.val().match(/^[a-zA-Z0-9_]+$/g);
									input.attr('data-titleCheckNoSpacesOrExtraChars-msg', 
										'The title can only contain letters A-Z, a-z, underscore _ or Numbers 0-9.');	
								}
								else {
									ret = input.val();
								}
								console.log(input.val(), ret);
								return ret;
							}
						}},
						description: {type:'string'},
						layout: {type:'string', editable: true}
					}
				}
			}
		});
		
		function layoutDropDown(container, options) {
			$('<input id="layoutDD" data-text-field="description" data-value-field="name" data-bind="value:' 
				+ options.field + '" />')
				.appendTo(container)
				.kendoDropDownList({
					autoBind: false,
					enabled: true,
					optionLabel: "Select Layout...",
					dataSource: {
						transport: {
							read: {
								url: 'cms/templates/activelayouts',
								dataType: 'json',
								type: 'GET'
							}
						}
					}
				});
		}

		var dropdownYesNoData = [
			{ 'value' : 'true', 'text' : 'Yes' },
			{ 'value' : 'false', 'text' : 'No' },
		];

		$('#structures-grid').kendoGrid({
			dataSource: structData,
			toolbar: ['create'/*, 'save'*/],
			sortable: false,
			filterable: false,
			scrollable: true,
			selectable: true,
			editable: 'inline', // 'inline' with editable: true the delete command is not working!
			columns: [
				{field:'position', title:'#', width:'50'},
				{field:'active', title:'Active?', width:'70',values: dropdownYesNoData },
				{field:'title', title:'Title'},
				{field:'description', title:'Description'},
				{field:'layout', title:'Layout', editor: layoutDropDown },
				{command:['edit', 'destroy'], title:''}
			]
		});
	},

	populateModuleSelectionGrid: function() {
		if (this.debug) console.log('populating module selection data grid');

		$('#category-panelbar').kendoPanelBar({
			expandMode: 'single'
		});

		// make a kendo dropdown list from every 
		$('#structure').kendoDropDownList({
			optionLabel: 'Select structure...',
			dataTextField: 'title',
			dataValueField: 'id',
			dataSource: {
				transport: {
					read: 'cms/articles/activestructures',
					dataType: 'json',
					type: 'GET'
				}
			}
		});
	},

	populateArticleEditingForm: function() {
		if (this.debug) console.log('populating article editing form');
	}
}


$(document).ready(function(){
	cms.init();
});