<?php

/**
 * Remove an Letters
 */
class DigestLetterRemoveProcessor extends modObjectProcessor {
	public $objectType = 'DigestLetter';
	public $classKey = 'DigestLetter';
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
			return $this->failure($this->modx->lexicon('digest_letter_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var DigestLetter $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('digest_letter_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'DigestLetterRemoveProcessor';