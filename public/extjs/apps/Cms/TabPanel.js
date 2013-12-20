Ext.define('Cms.TabPanel', {

    extend: 'Ext.tab.Panel',
    alias: 'widget.cmsTabPanel',

    maxTabWidth: 230,
    border: false,

    initComponent: function() {
        this.tabBar = {
            border: true
        };

        this.callParent();
    },

    /**
     * Add a new feed
     * @param {String} title The title of the feed
     * @param {String} url The url of the feed
     */
    addWindow: function(title, controller){
        var active = this.items.first();
        if (!active) {
            active = this.add({
                xtype: 'windowDetail',
                title: title,
                controller: controller,
                closable: false,
                listeners: {
                    scope: this,
                    opentab: this.onTabOpen,
                    openall: this.onOpenAll,
                    rowdblclick: this.onRowDblClick
                }
            });
        } else {
            active.loadWindow(controller);
            active.tab.setText(title);
        }
        this.setActiveTab(active);
    },

    /**
     * Listens for a new tab request
     * @private
     * @param {Cms.WindowPost} The post
     * @param {Ext.data.Model} model The model
     */
    onTabOpen: function(post, rec) {
        var items = [],
            item,
            title;

        if (Ext.isArray(rec)) {
            Ext.each(rec, function(rec) {
                title = rec.get('title');
                if (!this.getTabByTitle(title)) {
                    items.push({
                        inTab: true,
                        xtype: 'windowPost',
                        title: title,
                        closable: true,
                        data: rec.data,
                        active: rec
                    });
                }
            }, this);
            this.add(items);
        }
        else {
            title = rec.get('title');
            item = this.getTabByTitle(title);
            if (!item) {
                item = this.add({
                    inTab: true,
                    xtype: 'windowPost',
                    title: title,
                    closable: true,
                    data: rec.data,
                    active: rec
                });
            }
            this.setActiveTab(item);
        }
    },

    /**
     * Find a tab by title
     * @param {String} title The title of the tab
     * @return {Ext.Component} The panel matching the title. null if not found.
     */
    getTabByTitle: function(title) {
        var index = this.items.findIndex('title', title);
        return (index < 0) ? null : this.items.getAt(index);
    },

    /**
     * Listens for a row dblclick
     * @private
     * @param {Cms.Detail} detail The detail
     * @param {Ext.data.Model} model The model
     */
    onRowDblClick: function(info, rec){
        this.onTabOpen(null, rec);
    },

    /**
     * Listens for the open all click
     * @private
     * @param {Cms.WindowDetail}
     */
    onOpenAll: function(detail) {
        this.onTabOpen(null, detail.getWindowData());
    }
});