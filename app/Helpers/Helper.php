<?php

use App\Locale;
use App\Post;
use App\Category;
use App\Setting;
use App\Ads;

/**
* get other locales
*/
if (!function_exists('getOtherLocales')) {
  function getOtherLocales()
  {
    return Locale::where('default',0)->get();
  }
}

/**
* get locales without
*/
if (!function_exists('getLocalesWithout')) {
  function getLocalesWithout($without)
  {
    return Locale::where('code','!=',$without)->get();
  }
}

/**
* check locale
*/
if (!function_exists('checkLocale')) {
  function checkLocale($code)
  {
    return Locale::where('code',$code)->count();
  }
}


/**
* get default locale
*/
if (!function_exists('getDefaultLocale')) {
  function getDefaultLocale()
  {
    return Locale::where('default',1)->first();
  }
}

/**
* get locale name
*/
if (!function_exists('getLocaleName')) {
  function getLocaleName($code)
  {
    $get =  Locale::select('name')->where('code',$code)->first();
    return $get->name;
  }
}

/**
* get main categories
*/
if (!function_exists('getMainCategories')) {
  function getMainCategories()
  {
    $get = Category::where('parent_id',0)->get();
    return $get;
  }
}

/**
* get popular posts
*/
if (!function_exists('getPopularPosts')) {
  function getPopularPosts()
  {
    return Post::orderBy('views','desc')->take(10)->get();
  }
}

/**
* get nav categories
*/
if (!function_exists('getNavCategories')) {
  function getNavCategories()
  {
    $get = Category::where('parent_id',0)->where('show_on_menu',1)->get();
    return $get;
  }
}

/**
* get setting
*/
if (!function_exists('getSetting')) {
  function getSetting($key)
  {
    $value = Cache::rememberForever("setting.{$key}", function () use ($key) {
      $get = Setting::where('key',$key)->first();
      return $get->value;
    });
    return $value;
  }
}

/**
* get ads
*/
if (!function_exists('getAds')) {
  function getAds($position)
  {
    $get = Ads::where('ads_position',$position)->where('publish',1)->first();
    if($get){
      return $get->ads_code;
    }

  }
}
