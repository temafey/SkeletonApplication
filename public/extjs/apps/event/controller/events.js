
        Ext.define('event.controller.events', {
            extend: 'Ext.app.Controller',
            init: function(){
                var storeLocal = this.getStore('event.store.eventsLocal');
                var store = this.getStore('event.store.events');
                storeLocal.addListener('load', function(){
                       this._onPingSuccess();
                    }, this);

                storeLocal.load();
            },
            _onPingSuccess: function(){
                var win             = this.getView('event.view.win.events').create();
                var localStore      = this.getStore('event.store.eventsLocal');
                var store           = this.getStore('event.store.events');
                var grid            = win.getComponent('event.view.grid.events');

                win.setTitle('Events');
                win.show();

                localCnt = localStore.getCount();

                if (localCnt > 0){
                    for (i = 0; i < localCnt; i++){
                        var localRecord = localStore.getAt(i);
                        var deletedId   = localRecord.data.id;
                        delete localRecord.data.id;
                        store.add(localRecord.data);
                        localRecord.data.id = deletedId;
                    }
                    store.sync();
                    for (i = 0; i < localCnt; i++){
                        localStore.removeAt(0);
                    }
                }

                store.load();
                //grid.bbar.bindStore(store);
                grid.reconfigure(store);
                grid.store.autoSync = true;
            },

            _onPingFailure: function(){
                var win             = this.getView('event.view.win.events').create();
                var localStore      = this.getStore('event.store.eventsLocal');
                var grid            = win.getComponent('event.view.grid.events');

                win.setTitle('Events');
                win.show();
                grid.bbar.bindStore(localStore);
                grid.reconfigure(localStore);
                grid.store.autoSync = true;
            }

        });