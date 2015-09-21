Digest.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'digest-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('digest_item_create'),
		width: 550,
		autoHeight: true,
		url: Digest.config.connector_url,
		action: 'mgr/newsletter/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	Digest.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(Digest.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'textfield',
			fieldLabel: _('digest_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('digest_item_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('digest_item_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	}

});
Ext.reg('digest-item-window-create', Digest.window.CreateItem);


Digest.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'digest-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('digest_item_update'),
		width: 550,
		autoHeight: true,
		url: Digest.config.connector_url,
		action: 'mgr/newsletter/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	Digest.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(Digest.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		}, {
			xtype: 'textfield',
			fieldLabel: _('digest_item_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('digest_item_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('digest_item_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	}

});
Ext.reg('digest-item-window-update', Digest.window.UpdateItem);