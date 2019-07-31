<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Portfolio;

use Portfolio\Contracts\PortfolioService as PortfolioContract;
//use Portfolio\PortfolioPost;

class PortfolioService implements PortfolioContract {

	public function GetItem( $input, $publicOnly = true ) {
		$q = PortfolioItem::where('slug', $input);
		if($publicOnly) {
			$q->where('status', PortfolioItem::STATUS_PUBLIC);
		}
		$article = $q->first();
		if(!$article) {
			if(is_numeric($input)) {
				$article = PortfolioItem::find($input);
			}
		}

		return $article;
	}

	public function GetList( $params = [] ) {
		return PortfolioItem::all();
		// TODO: Implement GetList() method.
	}

}