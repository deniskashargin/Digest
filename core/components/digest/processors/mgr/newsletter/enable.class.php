<?php

/**
 * Enable an Newsletter
 */
class DigestNewsletterEnableProcessor extends modObjectProcessor {
	public $objectType = 'DigestNewsletter';
	public $classKey = 'DigestNewsletter';
	public $languageTopics = array('digest');
	//public $permission = 'save';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('digest_newsletter_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var DigestNewsletter $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('digest_newsletter_err_nf'));
			}

			$object->set('active', true);
			$object->save();
		}

		return $this->success();
	}

}

return 'DigestNewsletterEnableProcessor';
