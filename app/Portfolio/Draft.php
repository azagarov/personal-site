<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 15:45
 */

namespace Portfolio;

use \Portfolio\Contracts\Draft as DraftContract;

use DB;
class Draft implements DraftContract {

	public function __construct($contentHash) {
		$this->hash = $contentHash;
		$this->_preCache();
	}

	protected function _preCache() {
		$this->_cache = DB::table('drafts')->where('entity', $this->hash)->get()->mapWithKeys(function($x) {
			return [$x->field => $x->content];
		})->all();
	}

	protected $_cache = [];

	protected $hash;

	public function clearAll() {
		DB::table('drafts')
		  ->where('entity', $this->hash)
		  ->delete();
		$this->_cache = [];
		return $this;
	}

	public function getAll() {
		return $this->_cache;
	}

	public function getField( $field ) {
		return $this->_cache[$field] ?? null;
	}

	public function setField( $field, $value ) {
		$value = $value ?? "";
		if(isset($this->_cache[$field])) {
			DB::table('drafts')
			  ->where('entity', $this->hash)
			  ->where('field', $field)
			  ->update(['content' => $value, ]);
		} else {
			DB::table('drafts')->insert([
				'entity' => $this->hash,
				'field' => $field,
				'content' => $value,
			]);
		}
		$this->_cache[$field] = $value;
		return $this;
	}

	public function clearField( $field ) {
		DB::table('drafts')
		  ->where('entity', $this->hash)
		  ->where('field', $field)
		  ->delete();
		unset($this->_cache[$field]);
		return $this;
	}
}