<?php
/**
 * The home manager controller for Digest.
 *
 */
class DigestHomeManagerController extends DigestMainController {
	/* @var Digest $Digest */
	public $Digest;
	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}
	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('digest');
	}
	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/widgets/newsletters.grid.js');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "digest-page-home"});
		});
		</script>');
	}
	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->Digest->config['templatesPath'] . 'home.tpl';
	}
}