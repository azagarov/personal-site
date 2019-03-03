<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 11:02
 */

namespace Blog;

use Blog\Contracts\BlogPostEditable as BlogPostContract;

class BlogPostEditable extends BlogPost implements BlogPostContract {
	protected $table = "blog_posts";

	public function prepareJson( array $params = [] ) {
		$response = $this->toArray();
		$response['categories'] = $this->categories->map(function($x) {return $x->id;});
		if($ts = strtotime($response['date_occurred'])) {
			$response['date_occurred'] = date('m/d/Y', $ts);
		}
		return $response;
	}

	public function updateWith( \stdClass $p ) {
		$this->slug = $p->slug;
		$this->status = $p->status;
		$this->main_order = $p->main_order;

		if(strtotime($p->date_occurred)) {
			$_obj = new \DateTime($p->date_occurred);
			$this->date_occurred = $_obj->format('Y-m-d');
		} else {
			$this->date_occurred = null;
		}

		$this->place_coordinates = $p->place_coordinates;
		$this->keywords = $p->keywords;

		$ok = $this->save();

		if($p->categories) {
			$this->categories()->sync($p->categories);
		} else {
			$this->categories()->sync([]);
		}

		return $ok;
	}

	public function __construct( array $attributes = [] ) {
		parent::__construct( $attributes );
		$this->status = self::STATUS_PRIVATE;
		$this->main_order = 0;

		$authorId = \Auth::id();
		if(!$authorId) {
			$authorId = 1; // Hardcoded My ID
		}
		$this->author_id = $authorId;

		$this->views_total = 0;
		$this->views_unique = 0;
		$this->shares_count = 0;

	}

	public function delete() {
		$this->status = self::STATUS_DELETED;
		$this->save();
		return $this;
	}

	public function publish() {
		$this->status = self::STATUS_PUBLIC;
		$this->save();
		return $this;
	}

	public function unPublish() {
		$this->status = self::STATUS_PRIVATE;
		$this->save();
		return $this;
	}

}