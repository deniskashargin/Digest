Digest.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'digest-panel-home', renderTo: 'digest-panel-home-div'
		}]
	});
	Digest.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(Digest.page.Home, MODx.Component);
Ext.reg('digest-page-home', Digest.page.Home);