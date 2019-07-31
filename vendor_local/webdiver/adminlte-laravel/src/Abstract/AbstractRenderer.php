<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 07/03/2019
 * Time: 15:07
 */

namespace MenuBuilder;

use MenuBuilder\Contracts\Menu;
use MenuBuilder\Contracts\MenuCaption;
use MenuBuilder\Contracts\MenuGroup;
use MenuBuilder\Contracts\MenuItem;
use MenuBuilder\Contracts\MenuSeparator;
use MenuBuilder\Contracts\Renderable;
use MenuBuilder\Contracts\Renderer;

abstract class AbstractRenderer implements Renderer {
	final public function Render( Renderable $item ) {
		switch(true) {
			case $item instanceof Menu:
				return $this->renderMenu($item);
				break;

			case $item instanceof MenuSeparator:
				return $this->renderSeparator($item);
				break;

			case $item instanceof MenuCaption:
				return $this->renderCaption($item);
				break;

			case $item instanceof MenuItem:
				return $this->renderItem($item);
				break;

			case $item instanceof MenuGroup:
				return $this->renderGroup($item);
				break;
		}
	}

	abstract protected function renderMenu(Menu $menu);
	abstract protected function renderSeparator(MenuSeparator $separator);
	abstract protected function renderCaption(MenuCaption $caption);
	abstract protected function renderItem(MenuItem $item);
	abstract protected function renderGroup(MenuGroup $group);
}