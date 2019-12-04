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
    $checkURI = $request->route()->getName();

    if(strpos($checkURI, 'LaravelInstaller::') === 0){
      return $next($request);
    }

    if(!$checkInstall){
      return redirect()->to('/install');
    }else{
      return $next($request);
    }

  }
}
