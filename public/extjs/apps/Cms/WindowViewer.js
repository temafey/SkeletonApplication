Ext.define('Cms.WindowViewer', {
    extend: 'Ext.container.Viewport',

    initComponent: function(){

        Ext.define('Window', {
            extend: 'Ext.data.Model',
            fields: ['title', 'controller']
        });

        Ext.define('WindowItem', {
            extend: 'Ext.data.Model',
            fields: ['title', 'author', {
                name: 'pubDate',
                type: 'date'
            }, 'link', 'description', 'content']
        });

        Ext.apply(this, {
            layout: {
                type: 'border',
                padding: 5
            },
            items: [this.createMenuPanel(), this.createWindowInfo()]
        });
        this.callParent(arguments);
    },

    /**
     * Create the list of fields to be shown on the left
     * @private
     * @return {Cms.MenuPanel} MenuPanel
     */
    createMenuPanel: function(){
        this.MenuPanel = Ext.create('Cms.MenuPanel', {
            region: 'west',
            collapsible: true,
            width: 225,
            //floatable: false,
            split: true,
            minWidth: 175,
            windows: [{
                title: 'Events',
                controller: 'Event.controller.Events'
            }],
            listeners: {
                scope: this,
                windowselect: this.onWindowSelect
            }
        });
        return this.MenuPanel;
    },

    /**
     * Create the Window info container
     * @private
     * @return {Cms.WindowInfo} WindowInfo
     */
    createWindowInfo: function(){
        this.WindowInfo = Ext.create('Cms.WindowInfo', {
            region: 'center',
            minWidth: 300
        });
        return this.WindowInfo;
    },

    /**
     * Reacts to a Window being selected
     * @private
     */
    onWindowSelect: function(window, title, url){
        this.WindowInfo.addWindow(title, url);
    }
});