<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Post;
use App\PostData;
use App\Category;

class MainController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $posts=Post::paginate(10);

    return view('mAdmin.posts.index',compact('posts'));
  }
  
}
