<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 28/02/2019
 * Time: 10:07
 */

namespace Blog\Contracts;

interface BlogPostEditable extends BlogPost {
	/**
	 * @param array $environment
	 *
	 * @return string
	 */
	public function getUrl(array $environment = []);
}