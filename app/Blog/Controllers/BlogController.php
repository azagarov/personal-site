<?php

namespace Blog\Controllers;

use App\Http\Controllers\Controller;

use Blog;

use Blog\Contracts\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

	public function __construct(BlogService $blog) {
		$this->blog = $blog;
	}


	public function category($categorySlug) {
		$category = $this->blog->GetCategory($categorySlug);
		if(!$category) return abort(404);


//		$category->
//dd(Blog::environment(['section' => $categorySlug, ])->CategoryView($category));
		return view(Blog::environment(['section' => $categorySlug, ])->CategoryView($category))->with([
			'category' => $category,
		]);
	}


	public function main() {
		echo "<h1>Hola</h1>";
	}

	/**
	 * @var Blog
	 */
	private $blog;


	public function ShowSinglePostForCategory($categorySlug, $slug) {
		$category = $this->blog->GetCategory($categorySlug);
		if(!$category) return abort(404);

		$post = $this->blog->GetPost($slug);
		if(!$post) return abort(404);

		return view(Blog::environment(['section' => $categorySlug, ])->PostView($post, $category))->with([
			'category' => $category,
			'post' => $post,
		]);

	}

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



//var_dump($post->meta('image', 'featured_image')->Content());
	    return view('blog.single_post')->with(['post' => $post, ]);

    }
}
