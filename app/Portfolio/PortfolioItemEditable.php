<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 11:02
 */

namespace Portfolio;

use Portfolio\Facades\Portfolio;
use Portfolio\Contracts\PortfolioItemEditable as PortfolioItemEditableContract;
use Portfolio\Contracts\CanHaveDraft;
use Portfolio\Traits\HasDraft;

class PortfolioItemEditable extends PortfolioItem implements PortfolioItemEditableContract, CanHaveDraft {
	use HasDraft;

	protected $table = "portfolio_items";

	public function localeContents() {
		return $this->hasMany('Portfolio\PortfolioItemContentEditable', 'post_id');
	}

	public function content($locale = 'en') {
		if(!isset($this->_content[$locale])) {
			$content = $this->localeContents()->where('locale', '=', $locale)->first();

			if(!$content) {
				$content = new PortfolioItemContentEditable();
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

				foreach(array_keys(Portfolio::langNames()) as $locale) {

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
					];
				}

				break;

			case 'edit':
			default:
				$response = $this->toArray();
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