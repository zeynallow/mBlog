<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SitemapController extends Controller
{

  /*
  * index
  */
  public function index(){
    return response()->view('sitemap.index')->header('Content-Type', 'text/xml');
  }

  /*
  * posts
  */
  public function posts(){

    $posts = Post::orderBy('id','desc')
    ->get();

    return response()->view('sitemap.posts', [
      'posts' => $posts,
      ])->header('Content-Type', 'text/xml');
    }

  }
