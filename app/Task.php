<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	const STATUS_OPEN = 'open';
	const STATUS_REOPENED = 'reopened';
	const STATUS_FIXED = 'fixed';
	const STATUS_ON_HOLD = 'on_hold';
	const STATUS_CLOSED = 'closed';

	const PRIORITY_LOW = 0;
	const PRIORITY_MEDIUM = 1;
	const PRIORITY_HIGH = 2;
	const PRIORITY_CRITICAL = 3;

	const CATEGORY_GENERAL = 'general';
	const CATEGORY_PERSONAL = 'personal';
	const CATEGORY_BLOG = 'blog';
	const CATEGORY_SITE = 'site';
	const CATEGORY_WORK = 'work';
	const CATEGORY_TRAVEL = 'travel';
	const CATEGORY_LIVING = 'living';

	public static function GetFullStatusesList() {
		$list = [];
		$list[self::STATUS_OPEN] = 'Open';
		$list[self::STATUS_REOPENED] = 'Reopened';
		$list[self::STATUS_FIXED] = 'Fixed';
		$list[self::STATUS_ON_HOLD] = 'On Hold';
		$list[self::STATUS_CLOSED] = 'Closed';
		return $list;
	}

	public static function GetFullPriorityList() {
		$list = [];
		$list[self::PRIORITY_LOW] = 'Low';
		$list[self::PRIORITY_MEDIUM] = 'Medium';
		$list[self::PRIORITY_HIGH] = 'High';
		$list[self::PRIORITY_CRITICAL] = 'Critical';
		return $list;
	}

	public static function GetCategoriesList() {
		$list = [];

		$list[self::CATEGORY_GENERAL] = 'General';
		$list[self::CATEGORY_PERSONAL] = 'Personal';
		$list[self::CATEGORY_BLOG] = 'Blog';
		$list[self::CATEGORY_SITE] = 'Site';
		$list[self::CATEGORY_WORK] = 'Work';
		$list[self::CATEGORY_TRAVEL] = 'Travel';
		$list[self::CATEGORY_LIVING] = 'Living';

		return $list;
	}

	public function GetCategoryName() {
		$list = self::GetCategoriesList();
		if(isset($list[$this->category])) {
			return $list[$this->category];
		} else {
			return '';
		}
	}

	public function ShortTitle() {
		if(strlen($this->title) <= 30) {
			return $this->title;
		} else {
			return substr($this->title, 0, 28).'...';
		}
	}
}
