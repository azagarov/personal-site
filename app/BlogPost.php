<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public function localeContents() {
    	return $this->hasMany('App\BlogPostContent', 'post_id');
    }

    public function content($locale = 'en') {
    	return $this->localeContents()->where('locale', '=', $locale)->first();
    }

	/**
	 * @param $slug
	 *
	 * @return BlogPost|null
	 */
    public static function GetBySlug($slug) {
    	return self::where('slug', '=', $slug)->first();
    }
}
