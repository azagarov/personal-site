<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 14:36
 */

namespace App\Blog\Facades;
use Route;

class BlogFacadeAccessor {
	public function publicRoutes() {
		Route::namespace('\Blog\Controllers')->prefix('blog')->group(function() {
			Route::get('/', 'BlogController@main');
			Route::get('post/{slug}', 'BlogController@ShowSinglePost');
		});
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
}