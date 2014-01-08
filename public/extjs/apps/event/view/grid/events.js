
        Ext.define('event.view.grid.events', {
            extend: 'Ext.grid.Panel',
            store: 'event.store.events',
            alias: 'widget.eventeventsGrid',
            width: 700,
            height: 500,
            requires: ['Ext.grid.plugin.CellEditing', 'Ext.form.field.*'],
            itemId: 'eventeventsGrid',
            initComponent : function() {
                this.cellEditing = Ext.create('Ext.grid.plugin.CellEditing', {
                    clicksToEdit: 2
                });
                this.plugins = this.cellEditing;
                this.columns = this.columnsGet();
                this.tbar    = this.tbarGet();
                this.bbar    = this.bbarGet();
                this.callParent();
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
                        store: 'event.store.events',
                        displayInfo: true,
                        displayMsg: 'Displaying topics {0} - {1} of {2}',
                        emptyMsg: 'No topics to display'
                    }
                ]
            },