
        Ext.define('event.store.eventsLocal', {
            extend: 'Ext.data.Store',
            requires  : ['Ext.data.proxy.LocalStorage'],
            model: 'event.model.events',

            proxy: {
                type: 'localstorage',
                id  : 'events'
            }
        });