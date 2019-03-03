<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 15:51
 */

namespace Blog\Traits;


use Blog\Draft;

trait HasDraft {
	public function canHaveDraft() {
		return (bool)$this->id;
	}

	/**
	 * @return Draft
	 */
	public function getDraft() {
		if(!($this->_draft instanceof Draft)) {
			$this->_draft = new Draft($this->_buildDraftHash());
		}
		return $this->_draft;
	}

	/**
	 * @var Draft
	 */
	protected $_draft;

	protected function _buildDraftHash() {
		return get_class($this)."_".$this->id;
	}
}