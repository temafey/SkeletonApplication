Ext.define('Cms.MenuPanel', {
    extend: 'Ext.panel.Panel',

    alias: 'widget.cmsMenuPanel',

    animCollapse: true,
    layout: 'fit',
    title: 'Modules',

    initComponent: function(){
        Ext.apply(this, {
            items: this.createView(),
            //dockedItems: this.createToolbar()
        });
        this.createMenu();
        this.addEvents(
            /**
             * @event windowRemove Fired when a Window is removed
             * @param {MenuPanel} this
             * @param {String} title The title of the Window
             * @param {String} url The url of the Window
             */
            'windowRemove',

            /**
             * @event windowSelect Fired when a Window is selected
             * @param {MenuPanel} this
             * @param {String} title The title of the Window
             * @param {String} url The url of the Window
             */
            'windowSelect'
        );

        this.callParent(arguments);
    },

    /**
     * Create the DataView to be used for the Window list.
     * @private
     * @return {Ext.view.View}
     */
    createView: function(){
        this.view = Ext.create('widget.dataview', {
            autoScroll: true,
            store: Ext.create('Ext.data.Store', {
                model: 'Window',
                data: this.windows
            }),
            selModel: {
                mode: 'SINGLE',
                listeners: {
                    scope: this,
                    selectionchange: this.onSelectionChange
                }
            },
            listeners: {
                scope: this,
                contextmenu: this.onContextMenu,
                viewready: this.onViewReady
            },
            trackOver: true,
            cls: 'window-list',
            itemSelector: '.window-list-item .tab-icon',
            overItemCls: 'window-list-item-hover',
            tpl: '<tpl for="."><div class="window-list-item">{title}</div></tpl>'
        });
        return this.view;
    },

    onViewReady: function(){
        this.view.getSelectionModel().select(this.view.store.first());
    },

    /**
     * Creates the toolbar to be used for controlling Windows.
     * @private
     * @return {Ext.toolbar.Toolbar}
     */
    createToolbar: function(){
        this.createActions();
        this.toolbar = Ext.create('widget.toolbar', {
            items: [this.addAction, this.removeAction]
        });
        return this.toolbar;
    },

    /**
     * Create the context menu
     * @private
     */
    createMenu: function(){
        this.menu = Ext.create('widget.menu', {
            items: [{
                scope: this,
                handler: this.onLoadClick,
                text: 'Load module',
                iconCls: 'module-load'
            }],
            listeners: {
                hide: function(c){
                    c.activeController = null;
                }
            }
        });
    },

    /**
     * Used when view selection changes so we can disable toolbar buttons.
     * @private
     */
    onSelectionChange: function(){
        var selected = this.getSelectedItem();
        //this.toolbar.getComponent('remove').setDisabled(!selected);
        if (selected) {
            this.loadWindow(selected);
        }
    },

    /**
     * React to the load Window menu click.
     * @private
     */
    onLoadClick: function(){
        this.loadWindow(this.menu.activeController);
    },

    /**
     * Loads a Window.
     * @private
     * @param {Ext.data.Model} rec The Window
     */
    loadWindow: function(rec){
        if (rec) {
            this.fireEvent('windowSelect', this, rec.get('title'), rec.get('controller'));
        }
    },

    /**
     * Gets the currently selected record in the view.
     * @private
     * @return {Ext.data.Model} Returns the selected model. false if nothing is selected.
     */
    getSelectedItem: function(){
        return this.view.getSelectionModel().getSelection()[0] || false;
    },

    /**
     * Listens for the context menu event on the view
     * @private
     */
    onContextMenu: function(view, index, el, event){
        var menu = this.menu;

        event.stopEvent();
        menu.activeController = view.store.getAt(index);
        menu.showAt(event.getXY());
    },

    /**
     * React to a Window being removed
     * @private
     */
    onRemoveWindowClick: function() {
        var active = this.menu.activeController || this.getSelectedItem();


        if (active) {
            this.view.getSelectionModel().deselectAll();
            this.animateNode(this.view.getNode(active), 1, 0, {
                scope: this,
                afteranimate: function() {
                    this.view.store.remove(active);

                }
            });
            this.fireEvent('windowRemove', this, active.get('title'), active.get('url'));
        }
    },

    /**
     * React to a Window attempting to be added
     * @private
     */
    onAddWindowClick: function(){
        var win = this.addActionWindow || (this.addActionWindow = Ext.create('Cms.actionWindow', {
            listeners: {
                scope: this,
                Windowvalid: this.onWindowValid
            }
        }));
        win.form.getForm().reset();
        win.show();
    },

    /**
     * React to a validation on a Window passing
     * @private
     * @param {Cms.actionWindow} win
     * @param {String} title The title of the Window
     * @param {String} url The url of the Window
     */
    onWindowValid: function(win, title, url){
        var view = this.view,
            store = view.store,
            rec;

        rec = store.add({
            url: url,
            title: title
        })[0];
        this.animateNode(view.getNode(rec), 0, 1);
    },

    /**
     * Animate a node in the view when it is added/removed
     * @private
     * @param {Mixed} el The element to animate
     * @param {Number} start The start opacity
     * @param {Number} end The end opacity
     * @param {Object} listeners (optional) Any listeners
     */
    animateNode: function(el, start, end, listeners){
        Ext.create('Ext.fx.Anim', {
            target: Ext.get(el),
            duration: 500,
            from: {
                opacity: start
            },
            to: {
                opacity: end
            },
            listeners: listeners
        });
    },

    // Inherit docs
    onDestroy: function(){
        this.callParent(arguments);
        this.menu.destroy();
    }
});