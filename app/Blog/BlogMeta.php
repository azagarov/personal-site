<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 06/08/2019
 * Time: 15:06
 */

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Blog\Contracts\BlogMeta as BlogMetaContract;

class BlogMeta extends Model implements BlogMetaContract{
	protected $table = 'blog_meta';
}