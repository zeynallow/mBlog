<?php

namespace App\Http\Controllers;

use Butschster\Head\Facades\Meta;
use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{

  /*
  * Get Category
  */
  public function get_category($slug){

    //Get Categories
    $category = Category::where('slug',$slug)
    ->where('parent_id',0)
    ->firstOrFail();

    //Check Categories Data
    if(!isset($category->category_data()[0])){
      abort(404);
    }

    //Get Posts
    $posts = Post::where('category_id',$category->id)
    ->where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(getSetting('pagination_per_page'));

    //Meta Tags
    Meta::prependTitle($category->category_data()[0]->title)
    ->setDescription($category->category_data()[0]->meta_description)
    ->setKeywords($category->category_data()[0]->meta_keywords);

    return view('mBlog.categories.show',compact('category','posts'));
  }

  /*
  * Get Sub Category
  */
  public function get_subcategory($category_slug,$subcategory_slug){

    //Get Categories
    $category = Category::where('slug',$category_slug)
    ->where('parent_id',0)
    ->firstOrFail();

    //Check Categories Data
    if(!isset($category->category_data()[0])){
      abort(404);
    }

    //Get Sub Categories
    $subcategory = Category::where('slug',$subcategory_slug)
    ->where('parent_id',$category->id)
    ->firstOrFail();

    //Check Sub Category Data
    if(!isset($subcategory->category_data()[0])){
      abort(404);
    }

    //Get Posts
    $posts = Post::where('category_id',$category->id)
    ->where('subcategory_id',$subcategory->id)
    ->where('publish',1)
    ->orderBy('created_at','desc')
    ->paginate(getSetting('pagination_per_page'));

    //Meta Tags
    Meta::prependTitle($category->category_data()[0]->title)
    ->setDescription($category->category_data()[0]->meta_description)
    ->setKeywords($category->category_data()[0]->meta_keywords);

    return view('mBlog.categories.show',compact('category','posts'));
  }

}
