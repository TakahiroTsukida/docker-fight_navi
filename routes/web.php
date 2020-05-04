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

    Route::get('home', 'UserController@show_home')->name('home');
    Route::get('search', 'UserController@search')->name('search');
    Route::get('shop', 'UserController@shop')->name('shop');

    Route::get('privacy', 'UserController@privacy');
    Route::get('description', 'UserController@description');

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

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


// Route::group(['prefix' => 'user'], function() {
    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
    // Route::post('login', 'Auth\LoginController@login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');
    //
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.show.register');
    // Route::post('register', 'Auth\RegisterController@register')->name('user.register');




    // Route::group(['middleware' => 'verified'], function() {
    //
    //     Route::get('search/favorite/add', 'User\FavoriteController@search_add');
    //     Route::get('search/favorite/delete', 'User\FavoriteController@search_delete');
        // Route::post('shop','User\FavoriteController@store')->name('favorites.favorite');
        // Route::delete('shop','User\FavoriteController@destroy')->name('favorites.unfavorite');

//         Route::get('email', 'User\ProfileController@resets_email')->name('user.resets.email');
//         Route::get("reset/{token}", "User\ChangeEmailController@reset");
//         Route::post('email', 'User\ChangeEmailController@sendChangeEmailLink');
//
//         Route::get('profile/mypage', 'User\ProfileController@mypage')->name('user.profile.mypage');
//         Route::get('profile/favorite', 'User\ProfileController@favorite')->name('user.profile.favorite');
//
//         Route::get('favorite/add', 'User\FavoriteController@add');
//         Route::get('favorite/delete', 'User\FavoriteController@delete');
//         Route::get('mypage/favorite/delete', 'User\FavoriteController@mypage_delete');
//
//         Route::get('profile/create', 'User\ProfileController@add')->name('user.profile.add');
//         Route::post('profile/create', 'User\ProfileController@create');
//
//         Route::get('profile/edit', 'User\ProfileController@edit')->name('user.profile.edit');
//         Route::post('profile/edit', 'User\ProfileController@update')->name('user.profile.update');
//
//         Route::get('review/create', 'User\ReviewController@add')->name('review.add');
//         Route::post('review/create', 'User\ReviewController@create')->name('review.create');
//         Route::get('review/edit', 'User\ReviewController@edit')->name('review.edit');
//         Route::post('review/edit', 'User\ReviewController@update')->name('review.update');
//         Route::get('review/delete', 'User\ReviewController@delete')->name('review.delete');
//     });
// });


// Route::group(['prefix' => 'admin'], function() {
//
//     Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
//     Route::post('login', 'Admin\Auth\LoginController@login');
//     Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');
//
//     Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.show.register');
//     Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');
//
//     Route::group(['middleware' => 'auth:admin'], function() {

//         Route::get('profile/mypage', 'Admin\AdminController@mypage')->name('admin.profile.mypage');
//
//         Route::get('profile/edit', 'Admin\AdminController@edit')->name('admin.profile.edit');
//         Route::post('profile/edit', 'Admin\AdminController@update')->name('admin.profile.update');
//
//         Route::get('shop/create', 'Admin\ShopController@add')->name('admin.shop.add');
//         Route::post('shop/create', 'Admin\ShopController@create')->name('admin.shop.create');
//
//         Route::get('shop/edit', 'Admin\ShopController@edit')->name('admin.shop.edit');
//         Route::post('shop/edit', 'Admin\ShopController@update')->name('admin.shop.update');
//
//         Route::get('shop/delete', 'Admin\ShopController@delete')->name('admin.shop.delete');
//     });
// });
//
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes(['verify' => true]);
