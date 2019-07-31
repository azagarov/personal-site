<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 15:21
 */

namespace Portfolio\Contracts;

interface Draft {
	public function getAll();
	public function clearAll();
	public function getField($field);
	public function setField($field, $value);
	public function clearField($field);
}