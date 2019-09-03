<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 14:36
 */

namespace Blog\Facades;
use Blog\Contracts\BlogEnvironment;
use Route;
use Request;

class BlogFacadeAccessor {
	public function publicRoutes() {

		if (!strpos(Request::url(),"admin")) {
			Route::namespace( '\Blog\Controllers' )->prefix( 'blog' )->group( function () {
				Route::get( '/', 'BlogController@main' );
				Route::get( 'post/{slug}', 'BlogController@ShowSinglePost' );
			} );

			Route::namespace( '\Blog\Controllers' )->group( function () {
				Route::get( '{categorySlug}/blog', 'BlogController@category' )//			     ->where('categorySlug', '(?!admin)')
				;
				Route::get( '{categorySlug}/blog/{slug}', 'BlogController@ShowSinglePostForCategory' )
//				     ->where( 'categorySlug', '(?!admin)' )
				;
			} );
		}
	}

	public function adminRoutes() {
		Route::namespace("\Blog\Controllers")->prefix('admin/blog')->group(function() {
			Route::get('posts', 'AdminBlogController@PostsList');
			Route::post('posts', 'AdminBlogController@PostsListAjax');

			Route::get('post/{id}', 'AdminBlogController@PostGetAjax');
			Route::post('post/{id?}', 'AdminBlogController@PostSaveAjax');

			Route::post('post/{id}/draft/{field}', 'AdminBlogController@SavePostFieldDraft');
			Route::post('post/{id}/lang/{locale}/draft/{field}', 'AdminBlogController@SavePostLangFieldDraft');

			Route::get('post/{id}/lang/{locale}', 'AdminBlogController@PostLangGetAjax');
			Route::post('post/{id}/lang/{locale}', 'AdminBlogController@PostLangSaveAjax');


			Route::post('test_slug', 'AdminBlogController@CheckSlugAjax');

			Route::get('edit-post/{postId}', 'AdminBlogController@EditPost');

			// ******* Deprecated **********

			Route::post('save-post/{postId}', 'AdminBlogController@SavePost');
			Route::post('save-post/{postId}/{locale}', 'AdminBlogController@SavePostContent');
		});

	}

	public function langNames() {
		return ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian', ];
	}

	/**
	 * @param array $params
	 *
	 * @return BlogEnvironment
	 */
	public function environment($params = []) {
		return \Blog\BlogEnvironment::GetInstance($params);
	}

}