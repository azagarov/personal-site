<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 15:43
 */

namespace Blog\Contracts;

/**
 * Interface CanHaveDraft
 * @package Blog\Contracts
 *
 */
interface CanHaveDraft {

	/**
	 * @return Draft
	 */
	public function getDraft();

	/**
	 * @return boolean
	 */
	public function canHaveDraft();
}
