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


//mAdmin Routes
Route::group(['prefix' => 'mAdmin'], function() {

  //Auth
  Route::get('login', 'mAdmin\AuthController@showLoginForm')->name('login');
  Route::post('login', 'mAdmin\AuthController@login');
  Route::get('logout', 'mAdmin\AuthController@logout')->name('logout');

  Route::group(['middleware'=>'auth'], function() {

    // Posts
    Route::group(['prefix' => 'posts'], function() {
      Route::get('/', 'mAdmin\PostController@index')->name('mAdmin.posts.index');
      Route::get('create', 'mAdmin\PostController@create')->name('mAdmin.posts.create');
      Route::post('store', 'mAdmin\PostController@store')->name('mAdmin.posts.store');
      Route::get('edit/{post_id}', 'mAdmin\PostController@edit')->name('mAdmin.posts.edit');
      Route::post('update/{post_id}', 'mAdmin\PostController@update')->name('mAdmin.posts.update');
      Route::get('delete/{post_id}', 'mAdmin\PostController@destroy')->name('mAdmin.posts.destroy');
      Route::get('setAsFeature/{post_id}', 'mAdmin\PostController@setAsFeature')->name('mAdmin.posts.setAsFeature');
      Route::get('removeFeature/{post_id}', 'mAdmin\PostController@removeFeature')->name('mAdmin.posts.removeFeature');
    });

    // Categories
    Route::group(['prefix' => 'categories'], function() {
      Route::get('/', 'mAdmin\CategoryController@index')->name('mAdmin.categories.index');
      Route::get('create', 'mAdmin\CategoryController@create')->name('mAdmin.categories.create');
      Route::post('store', 'mAdmin\CategoryController@store')->name('mAdmin.categories.store');
      Route::get('edit/{category_id}', 'mAdmin\CategoryController@edit')->name('mAdmin.categories.edit');
      Route::post('update/{category_id}', 'mAdmin\CategoryController@update')->name('mAdmin.categories.update');
      Route::get('delete/{category_id}', 'mAdmin\CategoryController@destroy')->name('mAdmin.categories.destroy');
      Route::get('showOnMenu/{category_id}', 'mAdmin\CategoryController@showOnMenu')->name('mAdmin.categories.showOnMenu');
      Route::get('hideFromMenu/{category_id}', 'mAdmin\CategoryController@hideFromMenu')->name('mAdmin.categories.hideFromMenu');
      Route::get('getSubCategoryForSelect/{category_id}', 'mAdmin\CategoryController@getSubCategoryForSelect')->name('mAdmin.categories.getSubCategoryForSelect');

    });

  });

});



Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/changeLang/{locale}', 'HomeController@changeLang')->name('change.lang');

// Posts
Route::get('/post/{post_id}/{slug}', 'PostController@show')->name('post.show');

// Categories
Route::get('/{category_slug}', 'CategoryController@get_category')->name('category.index');
Route::get('/{category_slug}/{subcategory_slug}', 'CategoryController@get_subcategory')->name('subcategory.index');
