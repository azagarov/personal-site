<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 10:58
 */

namespace Portfolio\Contracts;

interface PortfolioEditableService {

	/**
	 * @param $id
	 *
	 * @return PortfolioItemEditable
	 */
	public function GetItem($id);

	public function GetList(array $params = []);

	public function CheckSlug($slug, $locale = 'en');
}