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

  Route::group(['middleware'=>['auth','mAdmin']], function() {

    Route::get('/dashboard', 'mAdmin\MainController@index')->name('mAdmin.index');

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

    // Pages
    Route::group(['prefix' => 'pages'], function() {
      Route::get('/', 'mAdmin\PageController@index')->name('mAdmin.pages.index');
      Route::get('create', 'mAdmin\PageController@create')->name('mAdmin.pages.create');
      Route::post('store', 'mAdmin\PageController@store')->name('mAdmin.pages.store');
      Route::get('edit/{post_id}', 'mAdmin\PageController@edit')->name('mAdmin.pages.edit');
      Route::post('update/{post_id}', 'mAdmin\PageController@update')->name('mAdmin.pages.update');
      Route::get('delete/{post_id}', 'mAdmin\PageController@destroy')->name('mAdmin.pages.destroy');
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

    // Settings
    Route::group(['prefix' => 'settings'], function() {
      Route::get('/', 'mAdmin\SettingController@general')->name('mAdmin.settings.general');
      Route::get('/visual', 'mAdmin\SettingController@visual')->name('mAdmin.settings.visual');
      Route::get('/social', 'mAdmin\SettingController@social')->name('mAdmin.settings.social');
      Route::get('/email', 'mAdmin\SettingController@email')->name('mAdmin.settings.email');
      Route::get('/other', 'mAdmin\SettingController@other')->name('mAdmin.settings.other');
      Route::get('/seo', 'mAdmin\SettingController@seo')->name('mAdmin.settings.seo');
      Route::get('/addLanguage/{code}', 'mAdmin\SettingController@addLanguage')->name('mAdmin.settings.addLanguage');
      Route::get('/deleteLanguage/{code}', 'mAdmin\SettingController@deleteLanguage')->name('mAdmin.settings.deleteLanguage');

      Route::post('/', 'mAdmin\SettingController@generalUpdate')->name('mAdmin.settings.generalUpdate');
      Route::post('/visual', 'mAdmin\SettingController@visualUpdate')->name('mAdmin.settings.visualUpdate');
      Route::post('/social', 'mAdmin\SettingController@socialUpdate')->name('mAdmin.settings.socialUpdate');
      Route::post('/other', 'mAdmin\SettingController@otherUpdate')->name('mAdmin.settings.otherUpdate');
      Route::post('/seo', 'mAdmin\SettingController@seoUpdate')->name('mAdmin.settings.seoUpdate');
      Route::post('/email', 'mAdmin\SettingController@emailUpdate')->name('mAdmin.settings.emailUpdate');

      Route::get('/locale/{code}', 'mAdmin\SettingController@localeUpdate')->name('mAdmin.settings.localeUpdate');
    });

    // User
    Route::group(['prefix' => 'users'], function() {
      Route::get('/', 'mAdmin\UserController@index')->name('mAdmin.users.index');
      Route::get('create', 'mAdmin\UserController@create')->name('mAdmin.users.create');
      Route::post('store', 'mAdmin\UserController@store')->name('mAdmin.users.store');
      Route::get('edit/{post_id}', 'mAdmin\UserController@edit')->name('mAdmin.users.edit');
      Route::post('update/{post_id}', 'mAdmin\UserController@update')->name('mAdmin.users.update');
      Route::get('delete/{post_id}', 'mAdmin\UserController@destroy')->name('mAdmin.users.destroy');
    });

    // ADS
    Route::group(['prefix' => 'ads'], function() {
      Route::get('/', 'mAdmin\AdsController@index')->name('mAdmin.ads.index');
      Route::get('edit/{ads_id}', 'mAdmin\AdsController@edit')->name('mAdmin.ads.edit');
      Route::post('update/{ads_id}', 'mAdmin\AdsController@update')->name('mAdmin.ads.update');
      Route::get('enable/{ads_id}', 'mAdmin\AdsController@enable')->name('mAdmin.ads.enable');
      Route::get('disable/{ads_id}', 'mAdmin\AdsController@disable')->name('mAdmin.ads.disable');
    });

    // Comments
    Route::group(['prefix' => 'comments'], function() {
      Route::get('/', 'mAdmin\CommentController@index')->name('mAdmin.comments.index');
      Route::get('delete/{comment_id}', 'mAdmin\CommentController@destroy')->name('mAdmin.comments.destroy');
    });

  });

});

// Auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/login/user', 'Auth\LoginController@loginUser')->name('login.xhr');

Route::group(['middleware'=>'auth'], function() {
  //Profile
  Route::get('/profile', 'ProfileController@index')->name('profile');
  Route::post('/profile', 'ProfileController@update')->name('profile.update');

  //Post Comment
  Route::post('/post/commentStore', 'PostController@commentStore')->name('post.commentStore');
});


// Home
Route::get('/', 'HomeController@home')->name('home');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/changeLang/{locale}', 'HomeController@changeLang')->name('change.lang');

// Posts
Route::get('/post/{post_id}/{slug}', 'PostController@show')->name('post.show');

// Pages
Route::get('/page/{slug}', 'PageController@show')->name('page.show');

// Sitemap
Route::get('/sitemap.xml', 'SitemapController@index')->name('sitemap.index');
Route::get('/sitemap/posts.xml', 'SitemapController@posts')->name('sitemap.posts');

// Categories
Route::get('/{category_slug}', 'CategoryController@get_category')->name('category.index');
Route::get('/{category_slug}/{subcategory_slug}', 'CategoryController@get_subcategory')->name('subcategory.index');
