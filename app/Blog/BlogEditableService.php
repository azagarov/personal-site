<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 26/02/2019
 * Time: 08:36
 */

namespace Blog;

use Blog\Contracts\BlogEditableService as BlogEditableContract;

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

	public function GetList( array $params = [] ) {
		$list = BlogPostEditable::where('status', '<>', BlogPostEditable::STATUS_DELETED)->get();
		return $list;
	}

	public function CheckSlug($slug, $locale = 'en') {
		if($post = BlogPostEditable::where('slug', $slug)->first()) {
			return ['type' => 'post', 'id' => $post->id, 'title' => $post->$locale->title, ];
		}

		if($category = BlogCategory::where('slug', $slug)->first()) {
			return ['type' => 'post', 'id' => $category->id, 'title' => $category->$locale->title, ];
		}

		return null;
	}

	public function GetCategories() {
		return BlogCategory::all();
	}

}