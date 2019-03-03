<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog;

use Blog\Contracts\Blog;
//use Blog\BlogPost;

class BlogService implements Blog {

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
}