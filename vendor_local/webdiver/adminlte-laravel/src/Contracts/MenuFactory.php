<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 07/03/2019
 * Time: 15:02
 */

namespace MenuBuilder\Contracts;


interface MenuFactory {
	/**
	 * @param array $params
	 *
	 * @return Menu
	 */
	public function CreateMenu(array $params = []);

	/**
	 * @param array $params
	 *
	 * @return MenuGroup
	 */
	public function CreateMenuGroup(array $params = []);

	/**
	 * @param array $params
	 *
	 * @return MenuItem
	 */
	public function CreateMenuItem(array $params = []);

	/**
	 * @param array $params
	 *
	 * @return MenuSeparator
	 */
	public function CreateMenuSeparator(array $params = []);

	/**
	 * @param array $params
	 *
	 * @return MenuCaption
	 */
	public function CreateMenuCaption(array $params = []);
}