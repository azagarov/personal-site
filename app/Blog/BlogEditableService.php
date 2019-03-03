<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog;

use Blog\Contracts\BlogEditableService as BlogEditableContract;
//use Blog\BlogPost;

class BlogEditableService implements BlogEditableContract {

	/**
	 * @param $id
	 *
	 * @return BlogPostEditable
	 */
	public function GetPost( $id ) {

		if(is_numeric($id) && $post = BlogPostEditable::find($id)) {
			return $post;
		} else {
			return new BlogPostEditable();
		}
	}
}