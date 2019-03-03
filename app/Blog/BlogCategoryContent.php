<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryContent extends Model
{
	public function category() {
		return $this->belongsTo('Blog\BlogCategory');
	}
}
