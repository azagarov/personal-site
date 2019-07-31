<?php

namespace Portfolio;

use Illuminate\Database\Eloquent\Model;
use Portfolio\Contracts\PortfolioItem as PortfolioItemContract;

class PortfolioItem extends Model implements  PortfolioItemContract {

	public function localeContents() {
		return $this->hasMany('Portfolio\PortfolioItemContent', 'item_id');
	}

	public function __get( $key ) {

		if(in_array($key, ['en', 'es', 'ru'])) {
			return $this->content($key);
		}


		if(in_array($key, ['title', 'short_description', 'extended_description', 'key_features', 'other_features', 'testimonials', ])) {
			$locale = \App::getLocale();
			$content = $this->content($locale);
			return $content->$key;
		}


		return parent::__get( $key );
	}

	public function pkeywords() {
		return array_filter(array_map(function($x) {return trim($x);}, explode(',', $this->keywords)), function($x) {return (bool)$x;});
	}

	/**
	 * @param string $locale
	 *
	 * @return PortfolioItemContent
	 */
	public function content($locale = 'en') {
		if(!isset($this->_content[$locale])) {
			$content = $this->localeContents()->where('locale', '=', $locale)->first();

			if(!$content) {
				$content = new PortfolioItemContent();
				$content->item_id = $this->id;
				$content->locale = $locale;
			}

			$this->_content[$locale] = $content;
		}

		return $this->_content[$locale];
	}

	private $_content = [];

	public function author() {
		return $this->belongsTo('App\User');
	}


	/**
	 * @param $slug
	 *
	 * @return PortfolioItem|null
	 */
	public static function GetBySlug($slug) {
		return self::where('slug', '=', $slug)->first();
	}


	public static function GetFullStatusesList() {
		return [
			self::STATUS_PUBLIC => 'Public',
			self::STATUS_PRIVATE => 'Private',
			self::STATUS_DELETED => 'Deleted',
		];
	}

	public function GetUrl(array $environment = []) {
		$environment = $this->_prepareUrlEnvironment($environment);

		switch($environment['section']) {
			default: // common
				return url("/portfolio/item/{$this->slug}");
				break;
		}
	}

	private function _prepareUrlEnvironment(array $environment = []) {
		if(!isset($environment['section'])) {
			$environment['section'] = 'common';
		}

		return $environment;
	}

	public function recordView( array $environment = [] ) {
		// TODO: Implement recordView() method.
	}

	public function recordShare( array $environment = [] ) {
		// TODO: Implement recordShare() method.
	}

}
