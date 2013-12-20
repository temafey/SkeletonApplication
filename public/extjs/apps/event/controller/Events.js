
        Ext.define('Event.controller.Events', {
            extend: 'Ext.app.Controller',
            //views: ['EventsGrid'],
           // models: ['Events'],
            //stores: ['Events', 'EventsLocal'],
            init: function(){
                this.storeLocal = this.getStore('Event.store.EventsLocal');
                this.store      = this.getStore('Event.store.Events');
                this.grid       = this.getView('Event.view.EventsGrid');
                this.storeLocal.addListener('load', function(){
                       this._onPingSuccess();
                    }, this);

                this.storeLocal.load();
            },
            _onPingSuccess: function(){
                var localCnt = this.storeLocal.getCount();

                if (localCnt > 0){
                    for (i = 0; i < localCnt; i++){
                        var localRecord = this.storeLocal.getAt(i);
                        var deletedId   = localRecord.data.id;
                        delete localRecord.data.id;
                        this.store.add(localRecord.data);
                        localRecord.data.id = deletedId;
                    }
                    this.store.sync();
                    for (i = 0; i < localCnt; i++){
                        this.storeLocal.removeAt(0);
                    }
                }

                this.store.load();
                this.store.autoSync = true;

                this.activeStore = this.store;
                //this.grid.reconfigure(this.store);
                //this.grid.store.autoSync = true;
            },

            _onPingFailure: function(){
                this.grid.bbar.bindStore(this.storeLocal);
                this.grid.reconfigure(this.storeLocal);
                this.grid.store.autoSync = true;
            }

        });