{# application.volt #}
Ext.application({
    name: 'event',
    appFolder: 'extjs/apps/event',
    launch: function(){
        Ext.get("event.view.EventsWin").show();
    },
    controllers: ['Events']
});