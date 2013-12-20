
        Ext.define('Event.store.Events', {
            extend: 'Ext.data.Store',
            alias: 'widget.eventEventsStore',
            requires: ['Ext.data.proxy.Ajax'],
            model: 'Event.model.Events',
            pageSize: 10,
            autoLoad: false,
            proxy: {
                type: 'ajax',
                api: {
                    read:    'admin/event/events/read',
                    update:  'admin/event/events/update',
                    create:  'admin/event/events/create',
                    destroy: 'admin/event/events/delete'
                },
                reader: {
                    type: 'json',
                    root: 'events',
                    totalProperty: 'results'
                },
                writer: {
                    type: 'json',
                    writeAllFields: false,
                    root: 'events'
                }
            }
        });