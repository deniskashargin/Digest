<?php

/**
 * Update an Newsletter
 */
class DigestNewsletterUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'DigestNewsletter';
	public $classKey = 'DigestNewsletter';
	public $languageTopics = array('digest');
	//public $permission = 'save';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return bool|string
	 */
	public function beforeSave() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id');
		$name = trim($this->getProperty('name'));
		if (empty($id)) {
			return $this->modx->lexicon('digest_newsletter_err_ns');
		}

		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('digest_newsletter_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name, 'id:!=' => $id))) {
			$this->modx->error->addField('name', $this->modx->lexicon('digest_newsletter_err_ae'));
		}

		return parent::beforeSet();
	}
}

return 'DigestNewsletterUpdateProcessor';
