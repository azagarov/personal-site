<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 21:55
 */

namespace Portfolio\Contracts;


interface PortfolioItemContentEditable extends PortfolioItemContent {
	/**
	 * @param \stdClass $p
	 *
	 * @return bool
	 */
	public function updateWith(\stdClass $p);
}