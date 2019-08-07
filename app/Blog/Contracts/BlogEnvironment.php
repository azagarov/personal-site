<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/08/2019
 * Time: 08:52
 */

namespace Blog\Contracts;


interface BlogEnvironment {
	public function PostView(BlogPost $post, BlogCategory $category = null);

	public function CategoryView(BlogCategory $category);
}