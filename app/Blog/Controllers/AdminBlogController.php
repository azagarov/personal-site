<?php

namespace Blog\Controllers;

use Blog\BlogCategory;
use Blog\BlogPost;
use Blog\BlogPostEditable;
use Blog\Contracts\BlogEditableService;
use Blog\Contracts\CanHaveDraft;
use Blog\Facades\Blog;
use Illuminate\Http\Request;
use \App\Http\Controllers\Controller;

class AdminBlogController extends Controller
{
    public function PostsList(Request $request) {
    	return view('admin.blog.posts')->with([
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
    	$post = $this->blog->GetPost($id);
    	$draft = [];
    	if($post instanceof CanHaveDraft && $post->canHaveDraft()) {
    		$draft = $post->getDraft()->getAll();
	    }
	    return response()->json([
	    	'post' => $post->prepareJson(),
		    'draft' => $draft,
	    ]);
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

	    $post = $this->blog->GetPost($p->id);
	    $ok = $post->updateWith($p);

	    if($post instanceof CanHaveDraft) {
	    	$post->getDraft()->clearAll();
	    }

    	return response()->json(['ok' => $ok, 'post' => $post->prepareJson(), ]);
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
	    $draft = [];
	    $content = $this->blog->GetPost($id)->content($locale);
	    if($content instanceof CanHaveDraft && $content->canHaveDraft()) {
		    $draft = $content->getDraft()->getAll();
	    }
    	return response()->json([
    		'content' => $content->prepareJson(),
		    'draft' => $draft,
	    ]);
    }


	private $_langNames = ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian', ];


    public function __construct(BlogEditableService $blog) {
    	$this->blog = $blog;
    }

	/**
	 * @var BlogEditableService
	 */
	private $blog;

	// ******************* Draft *****************************

	public function SavePostFieldDraft($id, $field, Request $request) {
		$post = $this->blog->GetPost($id);
		if(!$post) return abort(404);

		if($post instanceof CanHaveDraft) {
			$post->getDraft()->setField($field, $request->value);
		}

		return response()->json(['ok' => true, 'field' => $field,]);
	}

	public function SavePostLangFieldDraft($id, $locale, $field, Request $request) {
		$post = $this->blog->GetPost($id);
		if(!$post) return abort(404);

		$lang = $post->content($locale);

		if($lang instanceof CanHaveDraft) {
			$lang->getDraft()->setField($field, $request->value);
		}

		return response()->json(['ok' => true, 'field' => $field,]);
	}

    // ****************** Deprecated *************************

    public function PostLangSaveAjax($id, $locale, Request $request) {
    	if(!$request->postId) return abort(500);
    	if(!$request->get('locale')) return abort(500);
    	if(!$request->get('content')) return abort(500);

    	$post = $this->blog->GetPost($request->postId);
    	if(!$post) return abort(500);

	    $p = $this->_normalizePostLangInfoRequest($request->get('content'));

	    $content = $post->content($request->get('locale'));

	    $content->title = $p->title;
	    $content->annotation = $p->annotation;
	    $content->html_content = $p->html_content;
	    $content->place_name = $p->place_name;
	    $content->place_description = $p->place_description;

	    $ok = $content->save();

	    if($content instanceof CanHaveDraft) {
	    	$content->getDraft()->clearAll();
	    }

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
