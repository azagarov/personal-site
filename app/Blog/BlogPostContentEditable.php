<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 11:02
 */

namespace Blog;

use Blog\Contracts\BlogPostEditable as BlogPostContract;
use Blog\Contracts\CanHaveDraft;
use Blog\Traits\HasDraft;

class BlogPostContentEditable extends BlogPostContent implements  CanHaveDraft {
	use HasDraft;

	public function canHaveDraft() {
		return (bool)$this->post_id && (bool)$this->locale;
	}

	protected function _buildDraftHash() {
		return get_class($this)."_".$this->post_id."_".$this->locale;
	}

	protected $table = "blog_post_contents";

	public function prepareJson( array $params = [] ) {
		$response = $this->toArray();
		return $response;
	}

	public function updateWith( \stdClass $p ) {
	}

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
	}

}