<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 10:58
 */

namespace Blog\Contracts;

use Blog\BlogPostEditable;

interface BlogEditableService {

	/**
	 * @param $id
	 *
	 * @return BlogPostEditable
	 */
	public function GetPost($id);
}