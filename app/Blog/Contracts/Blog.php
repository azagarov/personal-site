<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog\Contracts;

interface Blog {

	/**
	 * @param $input
	 * @param bool $publicOnly
	 *
	 * @return BlogPost|null
	 */
	public function GetPost($input, $publicOnly = true);
}