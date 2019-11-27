<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostComment;

class PostController extends Controller
{

  /*
  * Post Show
  */
  public function show($post_id,$slug){
    $post = Post::where('id',$post_id)->where('slug',$slug)->firstOrFail();

    if(!$post->post_data()[0]){
      abort(404);
    }

    $post->increment('views');

    return view('mBlog.posts.show',compact('post'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function commentStore(Request $request)
  {
    $request->validate([
      'body'=>'required',
    ]);

    $input = $request->all();
    $input['user_id'] = auth()->user()->id;

    PostComment::create($input);

    return back();
  }

}
