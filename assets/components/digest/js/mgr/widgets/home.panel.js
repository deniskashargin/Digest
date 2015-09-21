Digest.panel.Home = function (config) {
	config = config || {};
	Ext.apply(config, {
		baseCls: 'modx-formpanel',
		layout: 'anchor',
		/*
		 stateful: true,
		 stateId: 'digest-panel-home',
		 stateEvents: ['tabchange'],
		 getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
		 */
		hideMode: 'offsets',
		items: [{
			html: '<h2>' + _('digest') + '</h2>',
			cls: '',
			style: {margin: '15px 0'}
		}, {
			xtype: 'modx-tabs',
			defaults: {border: false, autoHeight: true},
			border: true,
			hideMode: 'offsets',
			items: [{
				title: _('digest_newsletters'),
				layout: 'anchor',
				items: [{
					html: _('digest_newsletters_intro'),
					cls: 'panel-desc',
				}, {
					xtype: 'digest-grid-newsletters',
					cls: 'main-wrapper',
				}]
			}]
		}]
	});
	Digest.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(Digest.panel.Home, MODx.Panel);
Ext.reg('digest-panel-home', Digest.panel.Home);
