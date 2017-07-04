<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryContent extends Model
{
	public function category() {
		return $this->belongsTo('App\BlogCategory');
	}
}
