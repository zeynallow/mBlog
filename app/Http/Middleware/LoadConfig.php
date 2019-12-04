<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class LoadConfig
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    //check installed
    $checkInstall = file_exists(storage_path('installed'));
    
    if($checkInstall){
      //load config
      Config::set('app.name',getSetting('site_name'));

      if(getDefaultLocale()){
        Config::set('app.locale',getDefaultLocale()->code);
      }

      Config::set('app.timezone',getSetting('timezone'));
      Config::set('app.url',getSetting('site_url'));
      Config::set('mail.host',getSetting('email_host'));
      Config::set('mail.port',getSetting('email_port'));
      Config::set('mail.username',getSetting('email_username'));
      Config::set('mail.password',getSetting('email_password'));
      Config::set('mail.from.address',getSetting('email_address'));
      Config::set('mail.from.name',getSetting('email_title'));

    }

    return $next($request);
  }
}
