<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{

    public function index($slug){

      $category = Category::where('slug',$slug)->firstOrFail();

      $posts = Post::where('category_id',$category->id)
      ->where('publish',1)
      ->orderBy('created_at','desc')
      ->paginate(10);

      return view('mBlog.categories.show',compact('category','posts'));
    }

}
