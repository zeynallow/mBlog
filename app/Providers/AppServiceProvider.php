<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;

class AppServiceProvider extends ServiceProvider
{
  /**
  * Register any application services.
  *
  * @return void
  */
  public function register()
  {
    //
  }

  /**
  * Bootstrap any application services.
  *
  * @return void
  */
  public function boot()
  {

    //load config
    Config::set('app.name',getSetting('site_name'));
    Config::set('app.timezone',getSetting('timezone'));
    Config::set('app.url',getSetting('site_url'));
    Config::set('mail.host',getSetting('email_host'));
    Config::set('mail.port',getSetting('email_port'));
    Config::set('mail.username',getSetting('email_username'));
    Config::set('mail.password',getSetting('email_password'));
    Config::set('mail.from.address',getSetting('email_address'));
    Config::set('mail.from.name',getSetting('email_title'));

  }

}
