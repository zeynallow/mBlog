<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use App\Post;
use Session;

class HomeController extends Controller
{

  /*
  * Home Page
  */
  public function home(){

    $featuredPosts = NULL;

    //Get Last Posts
    $lastPosts = Post::where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(getSetting('pagination_per_page'));

    //Get Feature Posts
    if(getSetting('feature_post')){
      $featuredPosts = Post::where('publish',1)
      ->where('featured',1)
      ->orderBy('created_at','desc')
      ->limit(6)
      ->get();
    }

    //Meta Tags
    Meta::setTitle('Home Page')
    ->setDescription(getSetting('meta_description'))
    ->setKeywords(getSetting('meta_keywords'));

    return view('mBlog.pages.home',compact('lastPosts','featuredPosts'));
  }


  /*
  * Search Result
  */
  public function search(Request $request){

    if(!isset($request->q)){
      return redirect()->route('home');
    }

    $search_query = $request->q;

    //Get Last Posts
    $_result = Post::leftJoin('post_data','posts.id','=','post_data.post_id');
    $_result->where('posts.publish',1);

    $_result->where(function($query) use ($search_query){
      $query->where('post_data.title','LIKE','%'.$search_query.'%')
      ->orWhere('post_data.text','LIKE','%'.$search_query.'%');
    });

    $_result->orderBy('created_at','desc');
    $result = $_result->paginate(getSetting('pagination_per_page'));

    //Meta Tags
    Meta::setTitle(trans('site.search_result') . " | $search_query")
    ->setDescription(getSetting('meta_description'))
    ->setKeywords(getSetting('meta_keywords'));

    return view('mBlog.pages.search_result',compact('search_query','result'));
  }

  /*
  * Change Language (Locale Change)
  */
  public function changeLang($locale){
    Session::put('locale', $locale);
    return redirect()->back();
  }

}
