<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    public function show($post_id,$slug){
      $post = Post::where('id',$post_id)->where('slug',$slug)->firstOrFail();

      if(!$post->post_data[0]){
          abort(404);
      }

      return view('mBlog.posts.show',compact('post'));
    }

}
