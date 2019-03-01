<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function PostsList(Request $request) {
    	$list = BlogPost::where('status', '<>', BlogPost::STATUS_DELETED)->get();

    	return view('admin.blog.posts')->with([
    		'list' => $list,
		    'selectedMenuItem' => 'blog-posts-list',
	    ]);
    }

    public function PostsListAjax(Request $request) {
    	$list = BlogPost::where('status', '<>', BlogPost::STATUS_DELETED)->get();

    	return response()->json($list->map(function($x) {
		    /**
		     * @var BlogPost $x
		     */

		    $locales = array_keys($this->_langNames);

    		$p = [
    			'id' => $x->id,
//			    'title' => $x->en->title,
			    'slug' => $x->slug,
			    'status' => $x->status,
			    'keywords' => $x->keywords(),

			    'en' => [],
			    'es' => [],
			    'ru' => [],
		    ];

    		foreach($locales as $locale) {

			    $color = 'red';
			    if($x->$locale->id) {
				    $color = 'yellow';
				    if($x->$locale->title) {
					    $color = 'blue';
					    if($x->$locale->html_content) {
						    $color = 'green';
					    }
				    }
			    }

			    $p[$locale] = [
    				'title' => $x->$locale->title,
				    'color' => $color,
    				'categories' => $x->categories->map(function($c) use($locale) {
					    return $c->$locale->title;
				    }),
			    ];
		    }

		    return $p;
	    }));
    }

    public function EditPost($postId, Request $request) {

    	if($postId == 'new') {
		    $post = new BlogPost();
	    } else {
		    $post = BlogPost::find($postId);
	    }

    	return view('admin.blog.edit-post')->with([
    		'post' => $post,
		    'categories' => BlogCategory::all(),
		    'selectedMenuItem' => ('new' == $postId ? 'new-blog-post' : 'blog-posts-list'),
	    ]);
    }


    public function SavePost($postId, Request $request) {

    	if('new' == $postId) {
    		$_isCreating = true;
		    $post = new BlogPost();

		    $authorId = \Auth::id();
		    if(!$authorId) {
		    	$authorId = 1; // Hardcoded My ID
		    }
		    $post->author_id = $authorId;

		    $post->views_total = 0;
		    $post->views_unique = 0;
		    $post->shares_count = 0;

	    } else {
		    $_isCreating = false;
		    $post = BlogPost::find($postId);
	    }

	    /**
	     * @var BlogPost $post
	     */

    	$post->slug = $request->slug;
    	$post->status = $request->status;
    	$post->main_order = $request->main_order;

    	if(strtotime($request->date_occurred)) {
		    $_obj = new \DateTime($request->date_occurred);
		    $post->date_occurred = $_obj->format('Y-m-d');
	    } else {
    		$post->date_occurred = null;
	    }

    	$post->place_coordinates = $request->place_coordinates;

    	$post->keywords = $request->keywords;

    	$post->save();

    	if($request->categoryIds) {
		    $post->categories()->sync($request->categoryIds);
	    } else {
		    $post->categories()->sync([]);
	    }

	    if($_isCreating) {
    		$statusMessage = "New Post Created";
	    } else {
    		$statusMessage = "General Post Info Updated";
	    }

    	return redirect('/admin/blog/edit-post/'.$post->id)->with(["status" => $statusMessage]);
    }

    public function SavePostContent($postId, $locale, Request $request) {
    	$post = BlogPost::find($postId);

	    /**
	     * @var BlogPost $post
	     */

    	$content = $post->content($locale);

    	$content->title = $request->title;
    	$content->annotation = $request->annotation;
    	$content->html_content = $request->html_content;
    	$content->place_name = $request->place_name;
    	$content->place_description = $request->place_description;

    	$content->save();

	    return redirect('/admin/blog/edit-post/'.$post->id)->with(["status" => "{$this->_langNames[$locale]} Post Data Updated", 'selectedLocale' => $locale]);
    }

    private $_langNames = ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian', ];

}
