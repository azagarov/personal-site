<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

use Blog\Contracts\BlogCategory as BlogCategoryContract;

class BlogCategory extends Model implements BlogCategoryContract
{

	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';


	public function __get( $key ) {

		if(in_array($key, ['en', 'es', 'ru'])) {
			return $this->content($key);
		}

		if(in_array($key, ['title', 'description', ])) {
			$locale = \App::getLocale();
			$content = $this->content($locale);
			return $content->$key;
		}


		return parent::__get( $key );
	}


	public function localeContents() {
		return $this->hasMany('Blog\BlogCategoryContent', 'category_id');
	}

	public function content($locale = 'en') {
		return $this->localeContents()->where('locale', '=', $locale)->first();
	}

	/**
	 * @param $slug
	 *
	 * @return BlogCategory|null
	 */
	public static function GetBySlug($slug) {
		return self::where('slug', '=', $slug)->first();
	}

	public function posts() {
		return $this->belongsToMany('Blog\BlogPost', 'blog_post_category', 'category_id', 'post_id');
	}

}
