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

Route::get('/', function () {
  return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'mAdmin','middleware'=>'auth'], function() {
  // Posts
  Route::get('posts', 'mAdmin\PostController@index')->name('mAdmin.posts.index');
  Route::get('posts/create', 'mAdmin\PostController@create')->name('mAdmin.posts.create');
  Route::post('posts/store', 'mAdmin\PostController@store')->name('mAdmin.posts.store');

  // Categories
  Route::get('categories', 'mAdmin\CategoryController@index')->name('mAdmin.categories.index');
  Route::get('categories/create', 'mAdmin\CategoryController@create')->name('mAdmin.categories.create');
  Route::post('categories/store', 'mAdmin\CategoryController@store')->name('mAdmin.categories.store');

  Route::get('categories/getSubCategoryForSelect/{category_id}', 'mAdmin\CategoryController@getSubCategoryForSelect')->name('mAdmin.categories.getSubCategoryForSelect');

});
