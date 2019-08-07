<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/08/2019
 * Time: 09:06
 */

namespace Blog;

use Blog\Contracts\BlogCategory;
use Blog\Contracts\BlogEnvironment as BlogEnvironmentContract;
use Blog\Contracts\BlogPost;

class BlogEnvironment implements BlogEnvironmentContract {

	public function CategoryView( BlogCategory $category ) {

		$checkList = [
			"blog.{$this->params['section']}.category-{$category->slug}",
			"blog.{$this->params['section']}.category",
			"blog.category-{$category->slug}",
			"blog.category",
		];

		$view = null;
		foreach($checkList as $_v) {
			if(view()->exists($_v)) {
				$view = $_v;
				break;
			}
		}

		if(!$view) abort(404);

		return $view;
	}

	public function PostView( BlogPost $post, BlogCategory $category = null) {
		$checkList = [
			"blog.{$this->params['section']}.single_post-{$post->slug}",
			"blog.{$this->params['section']}.single_post",
			"blog.single_post-{$post->slug}",
			"blog.single_post",
		];

		$view = null;
		foreach($checkList as $_v) {
			if(view()->exists($_v)) {
				$view = $_v;
				break;
			}
		}

		if(!$view) abort(404);

		return $view;
	}

	/**
	 * @param array $params
	 *
	 * @return BlogEnvironmentContract
	 */
	public static function GetInstance(array $params) {
		$hash = md5(json_encode($params));

		if(!isset(self::$_repository[$hash])) {
			self::$_repository[$hash] = new self($params);
		}

		return self::$_repository[$hash];
	}

	private function __construct($params = []) {
		$this->params = $this->_normalizeParams($params);
	}

	const SECTION_DEFAULT = 'common';

	private function _normalizeParams($input = []) {
		/*
		 * 'section' => @default 'common'
		 */

		$output = [];
		$output['section'] = $input['section'] ?? self::SECTION_DEFAULT;
		return $output;
	}

	private static $_repository = [];

	private $params;
}