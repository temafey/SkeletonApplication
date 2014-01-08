
        Ext.define('event.model.events', {
            extend: 'Ext.data.Model',
            fields: [
                    {
                        name: 'id',
                        type: 'string'
                    },
                    {
                        name: 'namer',
                        type: 'string'
                    },
                    {
                        name: 'member',
                        type: 'string'
                    },
                    {
                        name: 'start',
                        type: 'date'
                    },
                    {
                        name: 'status',
                        type: 'string'
                    }
            ],
            validations: [],
            idProperty: 'id'
        });