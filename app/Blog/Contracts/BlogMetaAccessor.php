<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 06/08/2019
 * Time: 10:50
 */

namespace Blog\Contracts;

// TODO :: Probably Delete, once functionality was replaced with BlogMetaQuery
interface BlogMetaAccessor {
	public function GetByType($type);
	public function GetFirstByType($type);

	public function GetByKey($type);
	public function GetFirstByKey($type);

	public function GetByTypeAndKey($type);
	public function GetFirstByTypeAndKey($type);
}