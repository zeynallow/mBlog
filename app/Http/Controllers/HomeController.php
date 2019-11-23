<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;

class HomeController extends Controller
{

  /*
  * Home Page
  */
  public function home(){

    $lastPosts = Post::where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(10);

    $featuredPosts = Post::where('publish',1)
    ->where('featured',1)
    ->orderBy('created_at','desc')
    ->limit(6)
    ->get();

    return view('mBlog.pages.home',compact('lastPosts','featuredPosts'));
  }

  /*
  * Change Language (Locale Change)
  */
  public function changeLang($locale){
    Session::put('locale', $locale);
    return redirect()->back();
  }

}
