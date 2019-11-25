<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{

  /*
  * Get Category
  */
  public function get_category($slug){

    $category = Category::where('slug',$slug)
    ->where('parent_id',0)
    ->firstOrFail();

    if(!isset($category->category_data()[0])){
      abort(404);
    }

    $posts = Post::where('category_id',$category->id)
    ->where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(10);

    return view('mBlog.categories.show',compact('category','posts'));
  }

  /*
  * Get Sub Category
  */
  public function get_subcategory($category_slug,$subcategory_slug){

    $category = Category::where('slug',$category_slug)
    ->where('parent_id',0)
    ->firstOrFail();

    if(!isset($category->category_data()[0])){
      abort(404);
    }

    $subcategory = Category::where('slug',$subcategory_slug)
    ->where('parent_id',$category->id)
    ->firstOrFail();

    if(!isset($subcategory->category_data()[0])){
      abort(404);
    }

    $posts = Post::where('category_id',$category->id)
    ->where('subcategory_id',$subcategory->id)
    ->where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(10);

    return view('mBlog.categories.show',compact('category','posts'));
  }

}
