Digest.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'digest-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('digest_letter_create'),
		width: 550,
		autoHeight: true,
		url: Digest.config.connector_url,
		action: 'mgr/letter/create',
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
			fieldLabel: _('digest_letter_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('digest_letter_description'),
			name: 'description',
			id: config.id + '-description',
			height: 150,
			anchor: '99%'
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('digest_letter_active'),
			name: 'active',
			id: config.id + '-active',
			checked: true,
		}];
	}

});
Ext.reg('digest-letter-window-create', Digest.window.CreateItem);


Digest.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'digest-letter-window-update';
	}
	Ext.applyIf(config, {
		title: _('digest_letter_update'),
		width: 550,
		autoHeight: true,
		url: Digest.config.connector_url,
		action: 'mgr/letter/update',
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
			fieldLabel: _('digest_letter_name'),
			name: 'name',
			id: config.id + '-name',
			anchor: '99%',
			allowBlank: false,
		}, {
			xtype: 'textarea',
			fieldLabel: _('digest_letter_description'),
			name: 'description',
			id: config.id + '-description',
			anchor: '99%',
			height: 150,
		}, {
			xtype: 'xcheckbox',
			boxLabel: _('digest_letter_active'),
			name: 'active',
			id: config.id + '-active',
		}];
	}

});
Ext.reg('digest-letter-window-update', Digest.window.UpdateItem);