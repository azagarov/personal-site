<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$router->group(['middleware' => ['check.locale']], function($router) {
	Route::get('/', 'HomePageController@Show');

	Route::get('/development/', 'DevelopmentController@ShowHomePage')->name('development');
	Route::get('/development/cv', 'DevelopmentController@ShowCV');
	Route::get('/development/contacts', 'DevelopmentController@ShowContacts');

	Route::get('/music/', 'HomePageController@Show');
	Route::get('/diving/', 'HomePageController@Show');
	Route::get('/living/', 'HomePageController@Show');
	Route::get('/traveling/', 'HomePageController@Show');

	Route::namespace('\Blog\Controllers')->prefix('blog')->group(function() {
		Route::get('/', 'BlogController@main');
		Route::get('post/{slug}', 'BlogController@ShowSinglePost');
	});


	// ******************************************************************************
	// ************************ Administration Part *********************************
	// ******************************************************************************

	$router->group(['middleware' => ['auth']], function($router) {

		$router->group(['middleware' => ['admin']], function($router) {

			Route::prefix('admin')->group(function() {
				Route::redirect('/', '/dashboard');
				Route::get('dashboard', 'AdminDashboardController@show');

				Route::get('profile', 'AdminProfileController@show');

				Route::get('tasks', 'AdminTasksController@TasksList');
				Route::get('tasks/edit/{taskId}', 'AdminTasksController@EditTask');
				Route::post('tasks/save/{postId}', 'AdminTasksController@SaveTask');
			});

			// *************************** Blog Administration ********************************

			Route::namespace("\Blog\Controllers")->prefix('admin/blog')->group(function() {
				Route::get('posts', 'AdminBlogController@PostsList');
				Route::post('posts', 'AdminBlogController@PostsListAjax');

				Route::get('post/{id}', 'AdminBlogController@PostGetAjax');
				Route::post('post/{id?}', 'AdminBlogController@PostSaveAjax');

				Route::get('post/{id}/lang/{locale}', 'AdminBlogController@PostLangGetAjax');
				Route::post('post/{id}/lang/{locale}', 'AdminBlogController@PostLangSaveAjax');


				Route::post('test_slug', 'AdminBlogController@CheckSlugAjax');

				Route::get('edit-post/{postId}', 'AdminBlogController@EditPost');

				// ******* Deprecated **********

				Route::post('save-post/{postId}', 'AdminBlogController@SavePost');
				Route::post('save-post/{postId}/{locale}', 'AdminBlogController@SavePostContent');
			});
		});
	});
});




Route::get('/switchLanguage/{locale}', "MiscController@switchLocale");


Route::post('/contacts/send_message', 'MiscController@SendMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



