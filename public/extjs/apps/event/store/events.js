
        Ext.define('event.store.events', {
            extend: 'Ext.data.Store',
            alias: 'widget.eventeventsStore',
            requires: ['Ext.data.proxy.Ajax'],
            model: 'event.model.events',
            pageSize: 10,
            autoLoad: false,
            proxy: {
                type: 'ajax',
                api: {
                    read:    'cms/event/events/read',
                    update:  'cms/event/events/update',
                    create:  'cms/event/events/create',
                    destroy: 'cms/event/events/delete'
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