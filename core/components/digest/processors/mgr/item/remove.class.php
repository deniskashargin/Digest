<?php

/**
 * Remove an Items
 */
class DigestItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'DigestItem';
	public $classKey = 'DigestItem';
	public $languageTopics = array('digest');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('digest_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var DigestItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('digest_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'DigestItemRemoveProcessor';