<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function home(){

      $lastPosts = Post::where('publish',1)->paginate(10);

      return view('mBlog.pages.home',compact('lastPosts'));
    }
}
