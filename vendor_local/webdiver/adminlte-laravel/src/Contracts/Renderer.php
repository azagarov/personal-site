<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 07/03/2019
 * Time: 14:47
 */

namespace MenuBuilder\Contracts;


interface Renderer {
	/**
	 * @param Renderable $item
	 *
	 * @return mixed
	 */
	public function Render(Renderable $item);
}