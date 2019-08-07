<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog\Contracts;

interface BlogService {

	/**
	 * @param $input
	 * @param bool $publicOnly
	 *
	 * @return BlogPost|null
	 */
	public function GetPost($input, $publicOnly = true);

	/**
	 * @param $input
	 * @param bool $publicOnly
	 *
	 * @return BlogCategory|null
	 */
	public function GetCategory($input, $publicOnly = true);
}