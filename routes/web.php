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

Route::group(['prefix' => 'user'], function() {
    Route::get('home', 'User\UserController@show_home')->name('home');
    Route::get('search', 'User\UserController@search')->name('user.search');
    Route::get('shop', 'User\UserController@shop');

    Route::group(['middleware' => 'verified'], function() {

        Route::get('email', 'User\ProfileController@resets_email')->name('user.resets.email');
        Route::get("user/reset/{token}", "User\ChangeEmailController@reset");
        Route::post('user/email', 'User\ChangeEmailController@sendChangeEmailLink');

        Route::get('profile/mypage', 'User\ProfileController@mypage')->name('user.profile.mypage');

        Route::get('profile/create', 'User\ProfileController@add')->name('user.profile.add');
        Route::post('profile/create', 'User\ProfileController@create');

        Route::get('profile/edit', 'User\ProfileController@edit')->name('user.profile.edit');
        Route::post('profile/edit', 'User\ProfileController@update')->name('user.profile.update');

        Route::get('review/create', 'User\ReviewController@add')->name('review.add');
        Route::post('review/create', 'User\ReviewController@create')->name('review.create');
        Route::get('review/edit', 'User\ReviewController@edit')->name('review.edit');
        Route::post('review/edit', 'User\ReviewController@update')->name('review.update');
        Route::get('review/delete', 'User\ReviewController@delete')->name('review.delete');
    });
});


Route::group(['prefix' => 'admin'], function() {

    Route::get('login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\Auth\LoginController@login');
    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

    Route::get('register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.show.register');
    Route::post('register', 'Admin\Auth\RegisterController@register')->name('admin.register');

    Route::group(['middleware' => 'auth:admin'], function() {

        Route::get('profile/mypage', 'Admin\AdminController@mypage')->name('admin.profile.mypage');

        Route::get('profile/edit', 'Admin\AdminController@edit')->name('admin.profile.edit');
        Route::post('profile/edit', 'Admin\AdminController@update')->name('admin.profile.update');

        Route::get('shop/create', 'Admin\ShopController@add')->name('admin.shop.add');
        Route::post('shop/create', 'Admin\ShopController@create')->name('admin.shop.create');

        Route::get('shop/edit', 'Admin\ShopController@edit')->name('admin.shop.edit');
        Route::post('shop/edit', 'Admin\ShopController@update')->name('admin.shop.update');

        Route::get('shop/delete', 'Admin\ShopController@delete')->name('admin.shop.delete');
    });
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);
