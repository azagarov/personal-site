<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 11:02
 */

namespace Blog;

use Blog\Facades\Blog;
use Blog\Contracts\BlogPostEditable as BlogPostEditableContract;
use Blog\Contracts\CanHaveDraft;
use Blog\Traits\HasDraft;

class BlogPostEditable extends BlogPost implements BlogPostEditableContract, CanHaveDraft {
	use HasDraft;

	protected $table = "blog_posts";

	public function localeContents() {
		return $this->hasMany('Blog\BlogPostContentEditable', 'post_id');
	}

	public function content($locale = 'en') {
		if(!isset($this->_content[$locale])) {
			$content = $this->localeContents()->where('locale', '=', $locale)->first();

			if(!$content) {
				$content = new BlogPostContentEditable();
				$content->post_id = $this->id;
				$content->locale = $locale;
			}

			$this->_content[$locale] = $content;
		}

		return $this->_content[$locale];
	}
	private $_content = [];


	/**
	 * @param array $params
	 *   type : 'edit', 'list', ???;
	 *     default=edit
	 * @return array
	 */
	public function prepareJson( array $params = [] ) {

		$type = $params['type'] ?? 'edit';
		switch($type) {
			case 'list':
				$response = [
					'id' => $this->id,
//			    'title' => $x->en->title,
					'slug' => $this->slug,
					'status' => $this->status,
					'keywords' => $this->pkeywords(),

				];

				foreach(array_keys(Blog::langNames()) as $locale) {

					$color = 'red';
					if($this->$locale->id) {
						$color = 'yellow';
						if($this->$locale->title) {
							$color = 'blue';
							if($this->$locale->html_content) {
								$color = 'green';
							}
						}
					}

					$response[$locale] = [
						'title' => $this->$locale->title,
						'color' => $color,
						'categories' => $this->categories->map(function($c) use($locale) {
							return $c->$locale->title;
						}),
					];
				}

				break;

			case 'edit':
			default:
				$response = $this->toArray();
				$response['categories'] = $this->categories->map(function($x) {return $x->id;});
				if($ts = strtotime($response['date_occurred'])) {
					$response['date_occurred'] = date('m/d/Y', $ts);
				}
				break;
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