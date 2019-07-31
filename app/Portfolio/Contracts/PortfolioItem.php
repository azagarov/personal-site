<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 28/02/2019
 * Time: 10:07
 */

namespace Portfolio\Contracts;

interface PortfolioItem {
	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';


	/**
	 * @param array $environment
	 *
	 * @return string
	 */
	public function getUrl(array $environment = []);

	public function recordView(array $environment = []);

	public function recordShare(array $environment = []);

	/**
	 * @param $locale
	 *
	 * @return PortfolioItemContent
	 */
	public function content($locale);
}