
        Ext.define('event.view.EventsWin', {
            extend: 'Ext.Window',
            itemId: 'eventEventsWindow',
            layout: 'fit',
            items: [
                { xtype: 'eventEventsGrid', itemId: 'eventEventsGrid' }
            ]
        });