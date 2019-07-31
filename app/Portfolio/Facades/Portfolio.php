<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 10:05
 */

namespace Portfolio\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Portfolio
 * @package Portfolio\Facades
 *
 * @method GetPost
 */
class Portfolio extends Facade {
	protected static function getFacadeAccessor() {
		return 'portfolio';
	}
}