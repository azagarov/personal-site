<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\Contracts\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

	public function __construct(Blog $blog) {
		$this->blog = $blog;
	}

	/**
	 * @var Blog
	 */
	private $blog;

	public function ShowSinglePost($slug) {


//	    $post = BlogPost::GetBySlug($slug);

//	    $post->categories()->attach([6]);

//var_dump($post->categories);


//	    $category = BlogCategory::find(6);

//var_dump($category->posts);


//    	return;
	    $post = $this->blog->GetPost($slug);

	    if(!$post) {
	    	die("<h2>NO POST FOUND</h2>");
		    return;
	    }

	    return view('blog.single_post')->with(['post' => $post, ]);

    }
}
