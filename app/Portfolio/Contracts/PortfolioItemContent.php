<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 21:55
 */

namespace Portfolio\Contracts;


interface PortfolioItemContent {
	public function prepareJson();
}