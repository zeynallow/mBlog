<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Post;
use App\PostData;
use App\Category;

class PostController extends Controller
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

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::where('parent_id',0)->get();
    return view('mAdmin.posts.create',compact('categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    $locale = App::getLocale();
    $user = Auth::user();

    $request->validate([
      'title.*'=>'required|max:255',
      'text.*'=>'required',
      'slug'=>'required',
      'category_id'=>'required'
    ]);

    //Create Post
    $post = Post::create([
      'featured'=>($request->featured) ? 1 : 0,
      'publish'=> ($request->publish) ? 1 : 0,
      'category_id'=> ($request->category_id) ? $request->category_id : 0,
      'subcategory_id'=> ($request->subcategory_id) ? $request->subcategory_id : 0,
      'user_id'=> $user->id,
      'cover'=> ($request->cover) ? $request->cover : '',
      'slug'=>$request->slug
    ]);

    if($post){
      //Insert Post Data
      foreach ($request->title as $key => $title) {
        PostData::create([
          'title'=> $title,
          'text'=> $request->text[$key],
          'keywords'=> ($request->keywords[$key]) ? $request->keywords[$key] : '',
          'locale'=> $key,
          'post_id'=> $post->id
        ]);
      }
      return redirect()->back()->with('success','Post created successfully!');
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
    $categories = Category::where('parent_id',0)->get();
    $post = Post::findOrFail($id);

    return view('mAdmin.posts.edit',compact('categories','post'));
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
    $locale = App::getLocale();
    $user = Auth::user();

    $request->validate([
      'title.*'=>'required|max:255',
      'text.*'=>'required',
      'slug'=>'required',
      'category_id'=>'required'
    ]);

    //Update Post
    $post = Post::where('id',$id)
    ->update([
      'featured'=>($request->featured) ? 1 : 0,
      'publish'=> ($request->publish) ? 1 : 0,
      'category_id'=> ($request->category_id) ? $request->category_id : 0,
      'subcategory_id'=> ($request->subcategory_id) ? $request->subcategory_id : 0,
      'user_id'=> $user->id,
      'cover'=> ($request->cover) ? $request->cover : '',
      'slug'=>$request->slug
    ]);


    if($post){
      //Update Post Data
      foreach ($request->title as $key => $title) {
        PostData::where('id',$request->post_data_id[$key])->where('locale',$key)
        ->update([
          'title'=> $title,
          'text'=> $request->text[$key],
          'keywords'=> ($request->keywords[$key]) ? $request->keywords[$key] : '',
          'locale'=> $key
        ]);
      }

      //Insert New Post Data
      if($request->n_title){
        foreach ($request->n_title as $key => $n_title) {
          PostData::create([
            'title'=> $n_title,
            'text'=> $request->n_text[$key],
            'keywords'=> ($request->n_keywords[$key]) ? $request->n_keywords[$key] : '',
            'locale'=> $key,
            'post_id'=> $id
          ]);
        }
      }

      return redirect()->route('mAdmin.posts.index')->with('success','Post updated successfully!');
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
    $delete = Post::where('id',$id)->delete();

    if($delete){
      PostData::where('post_id',$id)->delete();
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

    return redirect()->back()->with('success','Post deleted successfully!');
  }

  /**
  * Set As Feature
  *
  * @param  int  $post_id
  * @return Back
  */
  public function setAsFeature($post_id){
    $update = Post::where('id',$post_id)
    ->update(['featured'=>1]);

    if($update){
      return redirect()->back()->with('success','Post set as featured successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }
  }

  /**
  * Remove Feature
  *
  * @param  int  $post_id
  * @return Back
  */
  public function removeFeature($post_id){
    $update = Post::where('id',$post_id)
    ->update(['featured'=>0]);

    if($update){
      return redirect()->back()->with('success','Post remove featured successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }
  }



}
