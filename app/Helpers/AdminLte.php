<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 06/03/2019
 * Time: 16:57
 */

if(!function_exists('adminlte')) {
	function adminlte($path) {
		$path = ltrim($path, '/ ');
		return url("/vendor/adminlte/{$path}");
	}
}