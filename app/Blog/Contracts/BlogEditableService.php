<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 10:58
 */

namespace Blog\Contracts;

interface BlogEditableService {

	/**
	 * @param $id
	 *
	 * @return BlogPostEditable
	 */
	public function GetPost($id);

	public function GetList(array $params = []);

	public function CheckSlug($slug, $locale = 'en');

	public function GetCategories();
}