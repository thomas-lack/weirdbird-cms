Ext.define('WeirdbirdCMS.controller.Structure', {
	extend: 'Ext.app.Controller',

	requires: [
		'Ext.grid.plugin.RowEditing',
		'WeirdbirdCMS.util.SelectImageWindow'
	],

	stores: [
		'Structures',
		'Layouts',
		'Modules',
		'ColumnMappings'
	],
	models: [
		'Structure',
		'Layout',
		'Module',
		'ColumnMapping'
	],
	
	// provide the rowedit plugin
	rowEditing: Ext.create('Ext.grid.plugin.RowEditing', {
        clicksToMoveEditor: 1,
        autoCancel: false
    }),

	/**
	* Creates a new structures-view and displays it at the main content panel
	*/
	populateStructuresGrid: function() {
		if (_cms.debug) console.log('populating structures data grid');

		// we have to load some stores manually, else the comboboxes bug
		//Ext.getStore('Layouts').load();
		//Ext.getStore('Modules').load();
		Ext.getStore('ColumnMappings').load();

		Ext.getStore('ColumnMappings').on('load', function(){
			// instantiate the view
		    if ( ! Ext.isDefined(Ext.getCmp('structuresForm')) )
		    	Ext.create('WeirdbirdCMS.view.Structure');
		    
		    // add view to viewport
		    _cms.fillContentPanel(Ext.getCmp('structuresForm'));

		    // after loading select the first entry to populate the 2nd form panel
	        if (Ext.getStore('Structures').count() > 0)
	            Ext.getCmp('categoriesGrid').getSelectionModel().select(0);

	        // unregister the load event - otherwise the structures panel will be
	        // reloaded on every module change event
	        Ext.getStore('ColumnMappings').un('load', this.events.load.listeners[0].fireFn);
		});
	},

	/*
	* Helper method to add comboboxes to the layout & modules formpanel
	*
	* params: 
	* columns 		int 		number of comboboxes to draw
	* noEntries		boolean 	(optional) automatically fill up comboboxes with values from the store
	* 
	*/
	paintModuleSelectionBoxes: function(columns, noEntries) {
		var cmp = Ext.getCmp('layoutModuleFormPanel');
		if (!Ext.isBoolean(noEntries))
			var noEntries = false;

		// remove all older module comboboxes
		for (var i = cmp.items.items.length; i > 1; i--) {
			var id = cmp.items.items[i-1].id;
			cmp.remove(id, true);
		}
		
		// add new module comboboxes
		for (var i = 0; i < columns; i++) {
			cmp.add({
				fieldLabel: _cms.lang.structures.form.column + ' ' + (i+1) + ' ' + _cms.lang.structures.form.module,
				id: 'moduleComboBoxColumn' + i,
				store: Ext.getStore('Modules'),
				emptyText: _cms.lang.structures.form.emptyText2,
				displayField: 'description',
				valueField: 'id',
				value: null,
				queryMode: 'local',
				listeners: {
					change: function(cmp, newValue, oldValue) {
						_cms.getController('Structure').onModuleChange(cmp, newValue, oldValue);
					}
				}
			});

			// if a module was selected before, set the value
			if (!noEntries) {
				var structure_id = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0].data.id;
				var q = Ext.getStore('ColumnMappings').query('structure_id', structure_id);
				for (var j=0; j < q.items.length; j++) {
					var data = q.items[j].data;
					if (data.column == i) {
						var index = Ext.getStore('Modules').find('id', data.module_id);
						var d = Ext.getStore('Modules').getAt(index).data.description;
						Ext.getCmp('moduleComboBoxColumn' + i).setValue(d);
					}
				}	
			}
		}
	},

	/**
	 * Event handler: the layout grid's store wrote a new entry
	 */
	onLayoutStoreWrite: function(store, op) {
		// if last operation was "create" and now we have an update,
        // we want to reload the store afterwards to get the objects new id
		var s = Ext.getStore('Structures');

        if (s.lastOperation == 'create' && op.action == 'update') {
            var newItem = Ext.getCmp('categoriesGrid').getSelectionModel().lastSelected;

            // register a new load event handler (and overwrite the previous one)
            // so that the newly created item is selected automatically after the store is loaded
            s.on('load', function(){
            	var newIndex = s.find('title', newItem.data.title);
            	Ext.getCmp('categoriesGrid').getSelectionModel().select(newIndex);
            });

            s.load();
        }
        
        s.lastOperation = op.action;
	},

	/**
	 * Event handler: module selection is changed
	 */
	onModuleChange: function(cmp, newValue, oldValue) {
		// save if new value is numeric
		if (Ext.isNumeric(newValue)) {
			var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];

	    	Ext.Ajax.request({
	    		url: 'cms/structurecolumnmappings/update',
	    		params: {
	    			structure_id: selection.data.id,
	    			column: cmp.id.slice(20,cmp.id.length),
	    			module_id: newValue
	    		},
	    		success: function() {
	    			// load mapping data again for correct lookup on later changes
	    			Ext.getStore('ColumnMappings').load();
	    		}
	    	});
		}
	},

	/**
	 * Event handler: selection changes
	 */
	onSelectionChange: function(model, records) {
		// link to formpanel on selection
        if (records[0]) {
           	var layout_id = records[0].data.layout_id;
           	var s = Ext.getStore('Layouts');
           	var i = s.find('id', layout_id);
           	
           	// if a layout record is found in the store we
           	// get the data and fill the layout combobox
           	if (i != -1) {
           		var rec = s.getAt(i);	
           		Ext.getCmp('layoutsComboBox').setValue(rec.data.description);

           		// also paint the corresponding number of module comboboxes
           		this.paintModuleSelectionBoxes(rec.data.columns);
           	}
           	else {
           		var c = Ext.getCmp('layoutsComboBox');
           		c.setValue(_cms.lang.structures.form.emptyText);
           		this.paintModuleSelectionBoxes(0);
           	}
           	
           	// update optional data form panel
           	Ext.Ajax.request({
	    		url: 'cms/structures/optional/' + records[0].data.id,
	    		method: 'GET',
	    		success: function(response) {
	    			var r = Ext.JSON.decode(response.responseText);
	    			Ext.getCmp('layoutsOptionalBackgroundDescription').setValue(r.backgroundDescription);
	    			Ext.getCmp('layoutsOptionalHeadline1').setValue(r.headline1);
	    			Ext.getCmp('layoutsOptionalHeadline2').setValue(r.headline2);
	    			Ext.getCmp('layoutsOptionalHeadline3').setValue(r.headline3);
	    			if (Ext.typeOf(r.background) == 'string')
	    				Ext.getCmp('layoutsOptionalBackground').setValue(r.background);
	    			else
	    				Ext.getCmp('layoutsOptionalBackground').setValue('<img src="/assets/images/no-image-available.png">');
	    			Ext.getCmp('layoutsOptionalBackground').imageId = r.file_id;
	    		}
	    	});
        }
	},

	/**
	 * Event handler: combobox value changed
	 */
	onComboChange: function(cmp, newValue, oldValue) {
		// save if new value is numeric
		if (Ext.isNumeric(newValue)) {
			var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
	    	if (typeof selection != 'undefined')
	    		selection.set('layout_id', newValue);

	    	// also repaint the column boxes
	    	var s = Ext.getStore('Layouts');
       		var i = s.find('id', newValue);
       		var rec = s.getAt(i);
	    	
	    	// paint new comboboxes
	    	this.paintModuleSelectionBoxes(rec.data.columns, true);
		}
	},

	/**
	 * Event handler: Add button pressed
	 */
	onAddBtn: function() {
		this.rowEditing.cancelEdit();
	    Ext.getStore('Structures').insert(0,new WeirdbirdCMS.model.Structure());
	    this.rowEditing.startEdit(0,0);
	},

	/**
	 * Event handler: Remove button pressed
	 */
	onRemoveBtn: function() {
		Ext.Msg.show({
			title: _cms.lang.structures.message.title,
			msg: _cms.lang.structures.message.content,
			buttons: Ext.Msg.YESNO,
			icon: Ext.Msg.WARNING,
			fn: function(btn) {
				if (btn == 'yes') {
					var selection = Ext.getCmp('categoriesGrid').getView().getSelectionModel().getSelection()[0];
		    		Ext.getStore('Structures').remove(selection);
		    		// finally select 1st entry again
		    		Ext.getCmp('categoriesGrid').getSelectionModel().select(0);
				}
			}
		});
	},

	/**
	 * Event handler: Save optional settings button pressed
	 */
	onSaveOptionalBtn: function() {
		var record = Ext.getCmp('categoriesGrid').getSelectionModel().getSelection()[0];
					
		Ext.Ajax.request({
			url: 'cms/structures/optional/' + record.data.id,
			method: 'POST',
			params: { 
				image_id: Ext.getCmp('layoutsOptionalBackground').imageId,
				backgroundDescription: Ext.getCmp('layoutsOptionalBackgroundDescription').getValue(),
				headline1: Ext.getCmp('layoutsOptionalHeadline1').getValue(),
				headline2: Ext.getCmp('layoutsOptionalHeadline2').getValue(),
				headline3: Ext.getCmp('layoutsOptionalHeadline3').getValue()
			},
			success: function(response) {
				Ext.MessageBox.alert(_cms.lang.structures.form2.saveSuccess1, 
					_cms.lang.structures.form2.saveSuccess2);
			},
			failure: function(response) {
				Ext.MessageBox.alert('Error', _cms.lang.structures.form2.saveError 
					+ ' (Error code ' + response.status + ').');
			}
		});
	},

	/**
	 * Event handler: Select image button pressed (optional settings form panel)
	 */
	onSelectImageBtn: function() {
		Ext.create('WeirdbirdCMS.util.SelectImageWindow').show('layoutsOptionalBackground');
	}
});