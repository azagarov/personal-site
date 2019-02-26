<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace App\Contracts;


interface Blog {

	/**
	 * @param $input
	 * @param bool $publicOnly
	 *
	 * @return \App\BlogPost|null
	 */
	public function GetArticle($input, $publicOnly = true);
}