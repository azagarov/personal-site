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

	Blog::publicRoutes();
	Portfolio::publicRoutes();

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
			Blog::adminRoutes();
			Portfolio::adminRoutes();
		});
	});
});




Route::get('/switchLanguage/{locale}', "MiscController@switchLocale");


Route::post('/contacts/send_message', 'MiscController@SendMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



