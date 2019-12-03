<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\UserRole;

class UserController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $users=User::orderBy('id','desc')->paginate(10);

    return view('mAdmin.users.index',compact('users'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $user_roles = UserRole::all();
    return view('mAdmin.users.create',compact('user_roles'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {

    $request->validate([
      'name'=>'required|max:255',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'password_confirmation' => 'required|min:6|max:20|same:password',
    ]);

    //Create User
    $user = User::create([
      'name'=> $request->name,
      'role_id'=> $request->role_id,
      'email'=> $request->email,
      'password'=> Hash::make($request->password)
    ]);

    if($user){
      return redirect()->back()->with('success','User created successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $user = User::findOrFail($id);
    $user_roles = UserRole::all();
    return view('mAdmin.users.edit',compact('user','user_roles'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {

    $request->validate([
      'name'=>'required|max:255',
      'email'=>'required|email'
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
    $user = User::where('id',$id)
    ->update(array_merge([
      'name'=> $request->name,
      'role_id'=> $request->role_id,
      'email'=> $request->email
    ],$change_password)
  );


  if($user){
    return redirect()->route('mAdmin.users.index')->with('success','User updated successfully!');
  }else{
    return redirect()->back()->with('error','Something went error...');
  }
}

/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return \Illuminate\Http\Response
*/
public function destroy($id)
{

  //check admin
  $check = User::where('id',$id)->first();
  if($check->role_id == 1){
    $admins = User::where('role_id',1)->count();
    if($admins <= 1){
      return redirect()->back()->with('error','Something went error...');
    }
  }


  $delete = User::where('id',$id)->delete();

  if($delete){
    return redirect()->back()->with('success','User deleted successfully!');
  }else{
    return redirect()->back()->with('error','Something went error...');
  }


}


}
