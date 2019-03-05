<?php

namespace Blog\Controllers;

use Blog\Contracts\BlogEditableService;
use Blog\Contracts\CanHaveDraft;
use Blog\Contracts\BlogPostEditable;

use Blog\BlogCategory;

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
    	return response()->json($this->blog->GetList()->map(function($post) {
		    /**
		     * @var BlogPostEditable $post
		     */
		    return $post->prepareJson(['type' => 'list', ]);
	    }));
    }

	public function EditPost($postId) {

		return view('admin.blog.edit-post')->with([
			'_id' => $postId,
			'categories' => $this->blog->GetCategories(),
			'selectedMenuItem' => ('new' == $postId ? 'new-blog-post' : 'blog-posts-list'),
		]);
	}

    public function PostGetAjax($id) {
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


    public function CheckSlugAjax(Request $request) {

	    $response = $this->blog->CheckSlug($request->slug);

	    if(!$response) {
	    	$response = ['type' => 'not_found', 'id' => 0, 'title' => 'Not Found', ];
	    }

        return response()->json($response);
    }

    public function PostLangGetAjax($id, $locale) {
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

	public function PostLangSaveAjax($id, $locale, Request $request) {
		if(!$request->postId) return abort(500);
		if(!$request->get('locale')) return abort(500);
		if(!$request->get('content')) return abort(500);

		$post = $this->blog->GetPost($id);
		if(!$post) return abort(500);


		$content = $post->content($locale);

		$p = $this->_normalizePostLangInfoRequest($request->get('content'));
		$ok = $content->updateWith($p);

		if($content instanceof CanHaveDraft) {
			$content->getDraft()->clearAll();
		}

		return response()->json([
			'ok' => $ok,
			'content' => $content,
		]);
	}



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



    // ******************** Private **************************

	private function _normalizePostMainInfoRequest(array $input) {
		$req = new \stdClass();
		$req->id = $input['id'] ?? false;
		$req->slug = $input['slug'] ?? '';
		$req->status = $input['status'] ?? BlogPostEditable::STATUS_PRIVATE;
		$req->main_order = $input['main_order'] ?? 0;
		$req->date_occurred = $input['date_occurred'] ?? null;
		$req->place_coordinates = $input['place_coordinates'] ?? null;
		$req->keywords = $input['keywords'] ?? null;
		$req->categories = $input['categories'] ?? [];
		return $req;
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


	// ****************** Deprecated *************************


}
