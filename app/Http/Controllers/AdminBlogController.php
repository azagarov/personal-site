<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogPost;
use App\Contracts\Blog;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function PostsList(Request $request) {
//    	$list = BlogPost::where('status', '<>', BlogPost::STATUS_DELETED)->get();

    	return view('admin.blog.posts')->with([
//    		'list' => $list,
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
			    'keywords' => $x->pkeywords(),

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

    public function PostGetAjax($id, Request $request) {
    	if(is_numeric($id) && $post = BlogPost::find($id)) {
    		$response = $this->_getPostJsonObj($post);
	    } else {
    		$response = [
			    'status' => BlogPost::STATUS_PRIVATE,
			    'main_order' => 0,
			    'categories' => [],
		    ];
	    }
	    return response()->json($response);
    }

    private function _getPostJsonObj(BlogPost $post) {
	    $response = $post->toArray();
	    $response['categories'] = $post->categories->map(function($x) {return $x->id;});
	    if($ts = strtotime($response['date_occurred'])) {
		    $response['date_occurred'] = date('m/d/Y', $ts);
	    }
	    return $response;
    }

    public function EditPost($postId, Request $request) {

    	if($postId == 'new') {
		    $post = new BlogPost();
		    $post->status = BlogPost::STATUS_PRIVATE;
		    $post->main_order = 0;
	    } else {
		    $post = BlogPost::find($postId);
	    }

//var_dump(json_encode($post));
    	return view('admin.blog.edit-post')->with([
    		'post' => $post,
		    'categories' => BlogCategory::all(),
		    'selectedMenuItem' => ('new' == $postId ? 'new-blog-post' : 'blog-posts-list'),
	    ]);
    }

    public function CheckSlugAjax(Request $request) {
    	$response = new \stdClass();
    	$response->ok = true;

    	$q = BlogPost::where('slug', $request->slug);
    	if($request->id) {
    		$q->where('id', '<>', $request->id);
	    }
	    $post = $q->first();
    	if($post) {
		    $response->ok = false;
		    $response->type = 'post';
		    $response->id = $post->id;
		    $response->title = $post->en->title;
	    } else {
		    $category = BlogCategory::GetBySlug($request->slug);
		    if($category) {
			    $response->ok = false;
			    $response->type = 'category';
			    $response->id = $category->id;
			    $response->title = $category->en->title;
		    }
	    }

        return response()->json($response);
    }

    private function _normalizePostMainInfoRequest(array $input) {
    	$req = new \stdClass();
    	$req->id = $input['id'] ?? false;
    	$req->slug = $input['slug'] ?? '';
    	$req->status = $input['status'] ?? BlogPost::STATUS_PRIVATE;
    	$req->main_order = $input['main_order'] ?? 0;
    	$req->date_occurred = $input['date_occurred'] ?? null;
    	$req->place_coordinates = $input['place_coordinates'] ?? null;
    	$req->keywords = $input['keywords'] ?? null;
    	$req->categories = $input['categories'] ?? [];
    	return $req;
    }

    public function PostSaveAjax($id, Request $request) {
    	if(!isset($request->post)) return abort(500);

	    $p = $this->_normalizePostMainInfoRequest($request->post);

	    if(!$p->id) {
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
		    $post = BlogPost::find($p->id);
	    }

//	    	    return response()->json(['r' => $request, 'x' => $post]);

	    /**
	     * @var BlogPost $post
	     */

	    $post->slug = $p->slug;
	    $post->status = $p->status;
	    $post->main_order = $p->main_order;

	    if(strtotime($p->date_occurred)) {
		    $_obj = new \DateTime($p->date_occurred);
		    $post->date_occurred = $_obj->format('Y-m-d');
	    } else {
		    $post->date_occurred = null;
	    }

	    $post->place_coordinates = $p->place_coordinates;
	    $post->keywords = $p->keywords;

	    $ok = $post->save();

	    if($p->categories) {
		    $post->categories()->sync($p->categories);
	    } else {
		    $post->categories()->sync([]);
	    }


    	return response()->json(['ok' => $ok, 'post' => $this->_getPostJsonObj($post), ]);
    }

    private function _normalizePostLangInfoRequest($input) {
	    $req = new \stdClass();
	    $req->annotation = $input['annotation'] ?? "";
	    $req->html_content = $input['html_content'] ?? "";
	    $req->title = $input['title'] ?? "";
	    $req->place_name = $input['place_name'] ?? null;
	    $req->place_description = $input['place_description'] ?? null;
	    return $req;

    }

    public function PostLangGetAjax($id, $locale, Request $request) {
    	return response()->json(BlogPost::find($id)->content($locale));
    }


	private $_langNames = ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian', ];



    // ****************** Deprecated *************************

    public function PostLangSaveAjax($id, $locale, Request $request) {
    	if(!$request->postId) return abort(500);
    	if(!$request->get('locale')) return abort(500);
    	if(!$request->get('content')) return abort(500);

    	$post = BlogPost::find($request->postId);
    	if(!$post) return abort(500);

	    $p = $this->_normalizePostLangInfoRequest($request->get('content'));

	    $content = $post->content($request->get('locale'));

	    $content->title = $p->title;
	    $content->annotation = $p->annotation;
	    $content->html_content = $p->html_content;
	    $content->place_name = $p->place_name;
	    $content->place_description = $p->place_description;

	    $ok = $content->save();

    	return response()->json([
    		'ok' => $ok,
		    'content' => $content,
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


}
