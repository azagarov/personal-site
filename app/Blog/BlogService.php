<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog;

use Blog\Contracts\BlogService as BlogContract;
//use Blog\BlogPost;

class BlogService implements BlogContract {

	public function GetPost( $input, $publicOnly = true ) {
		$q = BlogPost::where('slug', $input);
		if($publicOnly) {
			$q->where('status', BlogPost::STATUS_PUBLIC);
		}
		$article = $q->first();
		if(!$article) {
			if(is_numeric($input)) {
				$article = BlogPost::find($input);
			}
		}

		return $article;
	}

	public function GetCategory( $input, $publicOnly = true ) {
		$q = BlogCategory::where('slug', $input);
		if($publicOnly) {
			$q->where('status', BlogCategory::STATUS_PUBLIC);
		}
		$category = $q->first();
		if(!$category) {
			if(is_numeric($input)) {
				$category = BlogCategory::find($input);
			}
		}

		return $category;

	}

}