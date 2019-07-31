<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 28/02/2019
 * Time: 10:07
 */

namespace Portfolio\Contracts;

interface PortfolioItemEditable extends PortfolioItem {

	public function prepareJson(array $params = []);

	/**
	 * @param \stdClass $p
	 *
	 * @return bool
	 */
	public function updateWith(\stdClass $p);

	public function publish();
	public function unPublish();
	public function delete();

	/**
	 * @param $locale
	 *
	 * @return PortfolioItemContentEditable
	 */
	public function content($locale);

}