<?php

/**
 * Class DigestMainController
 */
abstract class DigestMainController extends modExtraManagerController {
	/** @var Digest $Digest */
	public $Digest;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('digest_core_path', null, $this->modx->getOption('core_path') . 'components/digest/');
		require_once $corePath . 'model/digest/digest.class.php';

		$this->Digest = new Digest($this->modx);
		//$this->addCss($this->Digest->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->Digest->config['jsUrl'] . 'mgr/digest.js');
		$this->addHtml('
		<script type="text/javascript">
			Digest.config = ' . $this->modx->toJSON($this->Digest->config) . ';
			Digest.config.connector_url = "' . $this->Digest->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('digest:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends DigestMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}