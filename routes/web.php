<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'User\UserController@show_top')->name('top');


Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
    Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

    Route::get('home', 'UserController@show_home')->name('home');
    Route::get('search', 'UserController@search')->name('search');
    Route::get('shop', 'UserController@shop')->name('shop');

    Route::get('privacy', 'UserController@privacy');
    Route::get('description', 'UserController@description');

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        Route::get('info', 'UserController@user_info');

        Route::get('search/favorite/add', 'FavoriteController@search_add');
        Route::get('search/favorite/delete', 'FavoriteController@search_delete');

        Route::get('email', 'ProfileController@resets_email')->name('resets.email');
        Route::get("reset/{token}", "ChangeEmailController@reset");
        Route::post('email', 'ChangeEmailController@sendChangeEmailLink');

        Route::get('profile/mypage', 'ProfileController@mypage')->name('profile.mypage');
        Route::get('profile/favorite', 'ProfileController@favorite')->name('profile.favorite');

        Route::get('favorite/add', 'FavoriteController@add');
        Route::get('favorite/delete', 'FavoriteController@delete');
        Route::get('mypage/favorite/delete', 'FavoriteController@mypage_delete');

        Route::get('profile/create', 'ProfileController@add')->name('profile.add');
        Route::post('profile/create', 'ProfileController@create');

        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/edit', 'ProfileController@update')->name('profile.update');

        Route::get('review/create', 'ReviewController@add')->name('review.add');
        Route::post('review/create', 'ReviewController@create')->name('review.create');
        Route::get('review/edit', 'ReviewController@edit')->name('review.edit');
        Route::post('review/edit', 'ReviewController@update')->name('review.update');
        Route::get('review/delete', 'ReviewController@delete')->name('review.delete');

    });
});


// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);


    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::resource('home', 'HomeController', ['only' => 'index']);

        Route::get('profile/mypage', 'AdminController@mypage')->name('profile.mypage');

        Route::get('profile/edit', 'AdminController@edit')->name('profile.edit');
        Route::post('profile/edit', 'AdminController@update')->name('profile.update');

        Route::get('shop/create', 'ShopController@add')->name('shop.add');
        Route::post('shop/create', 'ShopController@create')->name('shop.create');

        Route::get('shop/edit', 'ShopController@edit')->name('shop.edit');
        Route::post('shop/edit', 'ShopController@update')->name('shop.update');

        Route::get('shop/delete', 'ShopController@delete')->name('shop.delete');
    });

});
