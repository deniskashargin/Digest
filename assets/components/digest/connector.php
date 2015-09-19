<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var Digest $Digest */
$Digest = $modx->getService('digest', 'Digest', $modx->getOption('digest_core_path', null, $modx->getOption('core_path') . 'components/digest/') . 'model/digest/');
$modx->lexicon->load('digest:default');

// handle request
$corePath = $modx->getOption('digest_core_path', null, $modx->getOption('core_path') . 'components/digest/');
$path = $modx->getOption('processorsPath', $Digest->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));