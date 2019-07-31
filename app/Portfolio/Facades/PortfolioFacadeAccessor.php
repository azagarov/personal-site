<?php
/**
 * Created by PhpStorm.
 * User: aleksey
 * Date: 03/03/2019
 * Time: 14:36
 */

namespace Portfolio\Facades;
use Route;

class PortfolioFacadeAccessor {
	public function publicRoutes() {
		Route::namespace('\Portfolio\Controllers')->prefix('development/portfolio')->group(function() {
			Route::get('/', 'PortfolioController@main');
			Route::get('{slug}', 'PortfolioController@ShowSingleItem');
		});
	}

	public function adminRoutes() {
		Route::namespace("\Portfolio\Controllers")->prefix('admin/portfolio')->group(function() {
			Route::get('items', 'AdminPortfolioController@ItemsList');
			Route::post('items', 'AdminPortfolioController@ItemsListAjax');

			Route::get('item/{id}', 'AdminPortfolioController@ItemGetAjax');
			Route::post('item/{id?}', 'AdminPortfolioController@ItemSaveAjax');

			Route::post('item/{id}/draft/{field}', 'AdminPortfolioController@SaveItemFieldDraft');
			Route::post('item/{id}/lang/{locale}/draft/{field}', 'AdminPortfolioController@SaveItemLangFieldDraft');

			Route::get('item/{id}/lang/{locale}', 'AdminPortfolioController@ItemLangGetAjax');
			Route::post('item/{id}/lang/{locale}', 'AdminPortfolioController@ItemLangSaveAjax');


			Route::post('test_slug', 'AdminPortfolioController@CheckSlugAjax');

			Route::get('edit-item/{itemId}', 'AdminPortfolioController@EditItem');

			// ******* Deprecated **********

			Route::post('save-item/{itemId}', 'AdminPortfolioController@SaveItem');
			Route::post('save-item/{itemId}/{locale}', 'AdminPortfolioController@SaveItemContent');
		});

	}

	public function langNames() {
		return ['en' => 'English', 'es' => 'Spanish', 'ru' => 'Russian', ];
	}
}