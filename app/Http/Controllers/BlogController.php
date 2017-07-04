<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function ShowSinglePost($slug) {


	    $post = BlogPost::GetBySlug($slug);

//	    $post->categories()->attach([6]);

var_dump($post->categories);


	    $category = BlogCategory::find(6);

var_dump($category->posts);


    	return;
	    $post = BlogPost::GetBySlug($slug);

	    if(!$post) {
	    	die("<h2>NO POST FOUND</h2>");
		    return;
	    }

	    $content = $post->content(\App::getLocale());

	    return view('blog.single_post')->with(['post' => $post, 'content' => $content, ]);

    }
}
