
        Ext.define('event.view.win.events', {
            extend: 'Ext.Window',
            itemId: 'eventeventsWindow',
            layout: 'fit',
            items: [
                { xtype: 'eventeventsGrid', itemId: 'eventeventsGrid' }
            ]
        });