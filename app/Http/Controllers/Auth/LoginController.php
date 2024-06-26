<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Butschster\Head\Facades\Meta;
use Auth;

class LoginController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles authenticating users for the application and
  | redirecting them to your home screen. The controller uses a trait
  | to conveniently provide its functionality to your applications.
  |
  */

  use AuthenticatesUsers;

  /**
  * Where to redirect users after login.
  *
  * @var string
  */
  protected $redirectTo = '/home';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {

    //Meta Tags
    Meta::setTitle('Sign In')
    ->setDescription(getSetting('meta_description'))
    ->setKeywords(getSetting('meta_keywords'));

    return view('auth.login');
  }

  /**
  * Logout.
  */
  public function logout(Request $request) {
    Auth::logout();
    return redirect()->back();
  }

  /**
  * Login With XHR
  */
  public function loginUser(Request $request)
  {

    $request->validate([
      'email'=>'required|email',
      'password'=>'required'
    ]);

    // Attempt Login
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      $msg = array(
        'status'  => 'success',
        'message' => 'Login Successful'
      );
      return response()->json($msg);
    } else {
      $msg = array(
        'status'  => 'error',
        'message' => 'E-mail or Password is wrong'
      );
      return response()->json($msg);
    }
  }
}
