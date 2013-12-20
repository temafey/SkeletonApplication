
        Ext.define('Event.view.EventsGrid', {
            extend: 'Ext.grid.Panel',
            store: 'Event.store.Events',
            alias: 'widget.eventEventsGrid',
            width: 700,
            height: 500,
            requires: ['Ext.grid.plugin.CellEditing', 'Ext.form.field.*'],
            itemId: 'eventEventsGrid',
            initComponent : function() {
                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 2
                });
                this.plugins = this.cellEditing;
                this.columns = this.columnsGet();
                this.tbar    = this.tbarGet();
                this.bbar    = this.bbarGet();
                this.callParent();
                this.on('selectionchange', this.onSelect, this);
            },
            columnsGet: function(){
                return [
			{
			width: 80,
			sortable: true,
			text: 'Primary',
			field: 'textfield',
			dataIndex: 'id'
			},
			{
			width: 80,
			sortable: true,
			text: 'Name',
			field: 'textfield',
			dataIndex: 'namer'
			},
			{
			width: 120,
			sortable: true,
			text: 'Member',
			field: 'textfield',
			dataIndex: 'member'
			},
			{
			width: 80,
			sortable: true,
			text: 'Start',
			field: 'textfield',
			dataIndex: 'start'
			},
			{
			width: 120,
			sortable: true,
			text: 'Status',
			field: 'textfield',
			dataIndex: 'status'
			}
                ]
            },
            tbarGet: function(){
                return[
                    {
                        xtype: 'button',
                        text: 'Add',
                        iconCls: 'icon-add',
                        handler: this._onUserAddClick
                    },
                    {
                        type: 'button',
                        text: 'Remove',
                        iconCls: 'icon-delete',
                        handler: this._onUserDelClick
                    }
                ]
            },

            _onUserAddClick: function(button){
            },

            _onUserDelClick: function(button){
            },
            bbarGet: function(){
                return [
                    {
                        xtype: 'pagingtoolbar',
                        store: 'Event.store.Events',
                        displayInfo: true,
                        displayMsg: 'Displaying topics {0} - {1} of {2}',
                        emptyMsg: 'No topics to display'
                    }
                ]
            },

            /**
             * React to a grid item being selected
             * @private
             * @param {Ext.model.Selection} model The selection model
             * @param {Array} selections An array of selections
             */
            onSelect: function(model, selections){
                var selected = selections[0];
                if (selected) {
                    this.fireEvent('select', this, selected);
                }
            }
        });