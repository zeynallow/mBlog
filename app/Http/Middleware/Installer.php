<?php

namespace App\Http\Middleware;

use Closure;

class Installer
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

    $checkInstall = file_exists(storage_path('installed'));
    $checkURI = request()->route()->uri('install');

    if($checkURI == "install"){
      return $next($request);
    }

    if(!$checkInstall){
      return redirect()->to('/install');
    }else{
      return $next($request);
    }

  }
}
