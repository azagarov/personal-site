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
 * @return Draft
 */
interface CanHaveDraft {
	public function getDraft();

	/**
	 * @return boolean
	 */
	public function canHaveDraft();
}
