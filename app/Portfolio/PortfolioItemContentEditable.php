<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 11:02
 */

namespace Portfolio;

use Portfolio\Contracts\PortfolioPostEditable as PortfolioPostContract;
use Portfolio\Contracts\CanHaveDraft;
use Portfolio\Traits\HasDraft;

class PortfolioItemContentEditable extends PortfolioItemContent implements  CanHaveDraft {
	use HasDraft;

	public function canHaveDraft() {
		return (bool)$this->item_id && (bool)$this->locale;
	}

	protected function _buildDraftHash() {
		return get_class($this)."_".$this->item_id."_".$this->locale;
	}

	protected $table = "portfolio_item_contents";

	public function prepareJson( array $params = [] ) {
		$response = $this->toArray();
		return $response;
	}

	public function updateWith( \stdClass $p ) {

		$this->title = $p->title;
		$this->annotation = $p->annotation;
		$this->html_content = $p->html_content;
		$this->place_name = $p->place_name;
		$this->place_description = $p->place_description;

		return $this->save();
	}

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->html_content = "";
	}

}