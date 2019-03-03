<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 10:05
 */

namespace Blog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Blog
 * @package Blog\Facades
 *
 * @method GetPost
 */
class Blog extends Facade {
	protected static function getFacadeAccessor() {
		return 'blog';
	}
}