<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Portfolio;

use Portfolio\Contracts\PortfolioEditableService as PortfolioEditableContract;

class PortfolioEditableService implements PortfolioEditableContract {
	/**
	 * @param $id
	 *
	 * @return PortfolioItemEditable
	 */
	public function GetItem( $id ) {
		if(is_numeric($id) && $post = PortfolioItemEditable::find($id)) {
			return $post;
		} else {
			return new PortfolioItemEditable();
		}
	}

	public function GetList( array $params = [] ) {
		$list = PortfolioItemEditable::where('status', '<>', PortfolioItemEditable::STATUS_DELETED)->get();
		return $list;
	}

	public function CheckSlug($slug, $locale = 'en') {
		if($item = PortfolioItemEditable::where('slug', $slug)->first()) {
			return ['type' => 'item', 'id' => $item->id, 'title' => $item->$locale->title, ];
		}

		return null;
	}
}