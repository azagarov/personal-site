<?php

namespace App\Http\Controllers;

use App\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function ShowSinglePost($slug) {
	    $post = BlogPost::GetBySlug($slug);

	    if(!$post) {
	    	die("<h2>NO POST FOUND</h2>");
		    return;
	    }

	    $content = $post->content(\App::getLocale());

	    return view('blog.single_post')->with(['post' => $post, 'content' => $content, ]);

    }
}
