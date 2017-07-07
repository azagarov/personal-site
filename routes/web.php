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

	Route::get('/development/', 'DevelopmentController@ShowHomePage');
	Route::get('/music/', 'HomePageController@Show');
	Route::get('/diving/', 'HomePageController@Show');
	Route::get('/living/', 'HomePageController@Show');
	Route::get('/traveling/', 'HomePageController@Show');

	Route::get('/blog/', 'HomePageController@Show');

	Route::get('/blog/post/{slug}', 'BlogController@ShowSinglePost');


	// ******************************************************************************
	// ************************ Administration Part *********************************
	// ******************************************************************************

	$router->group(['middleware' => ['auth']], function($router) {
		Route::get('/admin/dashboard', 'AdminDashboardController@show');


		Route::get('/admin/blog/posts', 'AdminBlogController@PostsList');
		Route::get('/admin/blog/edit-post/{postId}', 'AdminBlogController@EditPost');

		Route::post('/admin/blog/save-post/{postId}', 'AdminBlogController@SavePost');
		Route::post('/admin/blog/save-post/{postId}/{locale}', 'AdminBlogController@SavePostContent');
	});
});




Route::get('/switchLanguage/{locale}', function($locale) {
	\Request::Session()->put('__currentLocale', $locale);

	return \Redirect::back();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



