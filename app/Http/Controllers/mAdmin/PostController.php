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
    return view('mAdmin.posts.index');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::all();
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
      return redirect()->back();
    }else{
      return redirect()->back()->withErrors(['message'=>'Something went error...']);
    }

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
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
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
