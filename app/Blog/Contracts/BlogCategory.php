<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 28/02/2019
 * Time: 10:11
 */

namespace Blog\Contracts;

interface BlogCategory {
	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';

}