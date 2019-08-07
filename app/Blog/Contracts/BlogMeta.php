<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/08/2019
 * Time: 17:21
 */

namespace Blog\Contracts;


interface BlogMeta {
	const STATUS_PUBLIC = 'public';
	const STATUS_PRIVATE = 'private';
	const STATUS_DELETED = 'deleted';

	const TYPE_NOTE = 'note';
	const TYPE_IMAGE = 'image';

	const LOCALE_ALL = 'all';

	const PARENT_TYPE_POST = 'post';
	const PARENT_TYPE_CATEGORY = 'category';
//	const PARENT_TYPE_COMMENT = 'comment';


}