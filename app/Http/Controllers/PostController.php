<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Butschster\Head\Packages\Entities\OpenGraphPackage;
use Illuminate\Http\Request;
use App\Post;
use App\PostComment;

class PostController extends Controller
{

  /*
  * Post Show
  */
  public function show($post_id,$slug){
    //Get Post
    $post = Post::where('id',$post_id)->where('slug',$slug)->firstOrFail();

    //Check Post Data
    if(!$post->post_data()[0]){
      abort(404);
    }

    //Increment Views
    $post->increment('views');

    //Meta Tags
    Meta::setTitle($post->post_data()[0]->title)
    ->setDescription(strip_tags($post->post_data()[0]->text))
    ->addMeta('image',['content'=> getSetting('site_url') . $post->cover]);

    $og = new OpenGraphPackage('facebook');
    $og->setType('website')
     ->setSiteName(getSetting('site_name'))
     ->setTitle($post->post_data()[0]->title)
     ->addImage(getSetting('site_url') . $post->cover)
     ->setDescription(strip_tags($post->post_data()[0]->text))
     ->setUrl(url()->current());

    Meta::registerPackage($og);

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
    //Validate
    $request->validate([
      'body'=>'required',
    ]);

    $input = $request->all();
    $input['user_id'] = auth()->user()->id;

    //Comment Create
    PostComment::create($input);

    return redirect()->back();
  }

}
