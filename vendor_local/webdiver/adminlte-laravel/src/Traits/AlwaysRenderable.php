<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 07/03/2019
 * Time: 15:11
 */

namespace MenuBuilder\Traits;

trait AlwaysRenderable {
	public function ShouldBeRendered() {
		return true;
	}
}