<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Contracts\BlogCategory as BlogCategoryContract;

class BlogCategory extends Model implements BlogCategoryContract
{

	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';

	public function localeContents() {
		return $this->hasMany('App\BlogCategoryContent', 'category_id');
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
		return $this->belongsToMany('App\BlogPost', 'blog_post_category', 'category_id', 'post_id');
	}

}
