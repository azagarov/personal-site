<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Portfolio\Contracts;

interface PortfolioService {

	/**
	 * @param $input
	 * @param bool $publicOnly
	 *
	 * @return PortfolioItem|null
	 */
	public function GetItem($input, $publicOnly = true);

	public function GetList($params = []);
}