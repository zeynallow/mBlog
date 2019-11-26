<?php

use App\Locale;
use App\Category;
use App\Setting;

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
    $get = Setting::where('key',$key)->first();
    return $get->value;
  }
}
