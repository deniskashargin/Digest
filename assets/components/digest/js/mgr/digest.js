var Digest = function (config) {
	config = config || {};
	Digest.superclass.constructor.call(this, config);
};
Ext.extend(Digest, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('digest', Digest);

Digest = new Digest();