<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 06/08/2019
 * Time: 14:55
 */

namespace Blog;

use Blog\Contracts\BlogMetaQuery as BlogMetaQueryContract;

class BlogMetaQuery implements BlogMetaQueryContract{

	public function Parent( $type, $id ) {
		$this->parentType = $type;
		$this->parentId = $id;
	}

	public function Type( $type ) {
		$this->type = $type;
	}

	public function Key( $key ) {
		$this->key = $key;
	}

	public function Status( $status ) {
		$this->status = $status;
	}

	public function Locale( $locale ) {
		$this->locale = $locale;
	}

	public function Option( $num, $value ) {
		$this->options[$num] = $value;
	}

	public function Get() {
		$query = $this->_makeQuery();
		if($query) {
			return $query->get();
		} else {
			return BlogMeta::all();
		}
	}


	public function First() {
		$query = $this->_makeQuery();
		if($query) {
			return $query->first();
		} else {
			return BlogMeta::first();
		}
	}

	public function Content() {
		$first = $this->First();
		if($first) {
			return $first->content;
		} else {
			return null;
		}
	}

	private function _makeQuery() {
		$query = null;

		if($this->parentType && $this->parentId) {
			if($query) {
				$query = $query->where('parent_type', $this->parentType)->where('parent_id', $this->parentId);
			} else {
				$query = BlogMeta::where('parent_type', $this->parentType)->where('parent_id', $this->parentId);
			}
		}

		if($this->type) {
			if($query) {
				$query = $query->where('type', $this->type);
			} else {
				$query = BlogMeta::where('type', $this->type);
			}
		}

		if($this->status) {
			if($query) {
				$query = $query->where('status', $this->status);
			} else {
				$query = BlogMeta::where('status', $this->status);
			}
		}

		if($this->key) {
			if($query) {
				if(is_array($this->key)) {
					$query = $query->whereIn('key', $this->key);
				} else {
					$query = $query->where('key', $this->key);
				}
			} else {
				if(is_array($this->key)) {
					$query = BlogMeta::whereIn('key', $this->key);
				} else {
					$query = BlogMeta::where('key', $this->key);
				}
			}
		}

		if($this->locale) {
			if($query) {
				$query = $query->where('locale', $this->locale);
			} else {
				$query = BlogMeta::where('locale', $this->locale);
			}
		}

		for($optionKey = 1; $optionKey <= 5; $optionKey++) {
			if(isset($this->options[$optionKey])) {
				if($query) {
					if(is_array($this->options[$optionKey])) {
						$query = $query->whereIn('option_'.$optionKey, $this->options[$optionKey]);
					} else {
						$query = $query->where('option_'.$optionKey, $this->options[$optionKey]);
					}
				} else {
					if(is_array($this->options[$optionKey])) {
						$query = BlogMeta::whereIn('option_'.$optionKey, $this->options[$optionKey]);
					} else {
						$query = BlogMeta::where('option_'.$optionKey, $this->options[$optionKey]);
					}
				}

			}
		}

		return $query;
	}

	private $parentType;
	private $parentId;

	private $type;
	private $status;
	private $key;
	private $locale;

	private $options = [];
}