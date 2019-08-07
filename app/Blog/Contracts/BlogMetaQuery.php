<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 06/08/2019
 * Time: 14:40
 */

namespace Blog\Contracts;


use Illuminate\Support\Collection;

interface BlogMetaQuery {

	/**
	 * @param string $type
	 * @param int $id
	 *
	 * @return BlogMetaQuery
	 */
	public function Parent($type, $id);

	/**
	 * @param string $type
	 *
	 * @return BlogMetaQuery
	 */
	public function Type($type);

	/**
	 * @param string|array $key
	 *
	 * @return BlogMetaQuery
	 */
	public function Key($key);

	/**
	 * @param string $status
	 *
	 * @return BlogMetaQuery
	 */
	public function Status($status);

	/**
	 * @param string $locale
	 *
	 * @return BlogMetaQuery
	 */
	public function Locale($locale);

	/**
	 * @param integer $num 1-5
	 * @param string|array $value
	 *
	 * @return BlogMetaQuery
	 */
	public function Option($num, $value);




	/**
	 * @return Collection|null
	 */
	public function Get();

	/**
	 * @return BlogPost|null
	 */
	public function First();

	/**
	 * @return string|null
	 */
	public function Content();
}