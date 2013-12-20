
        Ext.define('Event.store.EventsLocal', {
            extend: 'Ext.data.Store',
            requires  : ['Ext.data.proxy.LocalStorage'],
            model: 'Event.model.Events',

            proxy: {
                type: 'localstorage',
                id  : 'events'
            }
        });