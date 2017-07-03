<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPostContent extends Model
{
    public function post() {
    	return $this->belongsTo('App\BlogPost');
    }
}
