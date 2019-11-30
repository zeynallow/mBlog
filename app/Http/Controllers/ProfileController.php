<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;

class ProfileController extends Controller
{

  /*
  * Profile
  */
  public function index(){

    $featuredPosts = NULL;

    $user = Auth::user();

    //Meta Tags
    Meta::setTitle('Profile')
    ->setDescription(getSetting('meta_description'))
    ->setKeywords(getSetting('meta_keywords'));

    return view('mBlog.pages.profile',compact('user'));
  }

  /*
  * Profile Update
  */
  public function update(Request $request){

    $user = Auth::user();

    $request->validate([
      'name'=>'required|max:255',
      'email' => 'required|string|email|unique:users,email,'.$user->id.''
    ]);

    $change_password = [];

    if($request->password){
      if($request->password == $request->password_confirmation){
        $change_password = [
          'password'=> Hash::make($request->password)
        ];
      }else{
        return redirect()->back()->withErrors(['message'=>'The password confirmation does not match.']);
      }
    }

    //Update User
    $user = User::where('id',$user->id)
    ->update(array_merge([
      'name'=> $request->name,
      'email'=> $request->email
    ],$change_password)
  );

  return redirect()->back()->with(['success'=>'Profile Updated Successfully!']);

}


}
