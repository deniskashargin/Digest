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
		$this->addCss($this->Digest->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->Digest->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/widgets/items.windows.js');
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