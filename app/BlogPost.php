<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\BlogPost as BlogPostContract;

class BlogPost extends Model implements BlogPostContract
{
	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';

    public function localeContents() {
    	return $this->hasMany('App\BlogPostContent', 'post_id');
    }

    public function __get( $key ) {
    	if(in_array($key, ['title', 'annotation', 'html_content', 'place_name', 'place_description', ])) {
		    $locale = \App::getLocale();
    		$content = $this->content($locale);
    		return $content->$key;
	    }


	    return parent::__get( $key );
    }

	public function content($locale = 'en') {
    	$content = $this->localeContents()->where('locale', '=', $locale)->first();

    	if(!$content) {
    		$content = new BlogPostContent();
    		$content->post_id = $this->id;
    		$content->locale = $locale;
	    }

    	return $content;
    }

    public function author() {
    	return $this->belongsTo('App\User');
    }


	/**
	 * @param $slug
	 *
	 * @return BlogPost|null
	 */
    public static function GetBySlug($slug) {
    	return self::where('slug', '=', $slug)->first();
    }


    public function categories() {
    	return $this->belongsToMany('App\BlogCategory', 'blog_post_category', 'post_id', 'category_id');
    }


    public static function GetFullStatusesList() {
    	return [
    		self::STATUS_PUBLIC => 'Public',
		    self::STATUS_PRIVATE => 'Private',
		    self::STATUS_DELETED => 'Deleted',
	    ];
    }

    public function GetUrl(array $environment = []) {
	    $environment = $this->_prepareEnvironment($environment);

	    switch($environment->section) {
		    default: // common
				return url("/blog/post/{$this->slug}");
		    	break;
	    }
    }

    private function _prepareEnvironment(array $environment = []) {
    	if(!isset($environment['section'])) {
    		$environment['section'] = 'common';
	    }

	    return $environment;
    }
}
