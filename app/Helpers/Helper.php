<?php

use App\Locale;

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
