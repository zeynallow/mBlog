<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Category;
use App\CategoryData;

class CategoryController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $categories = Category::paginate(10);

    return view('mAdmin.categories.index',compact('categories'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $categories = Category::where('parent_id',0)->get();
    return view('mAdmin.categories.create',compact('categories'));

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

    $request->validate([
      'title.*'=>'required|max:255',
      'slug'=>'required'
    ]);

    //Create Category
    $category = Category::create([
      'show_on_menu'=> ($request->show_on_menu) ? 1 : 0,
      'parent_id'=> ($request->parent_id) ? $request->parent_id : 0,
      'menu_position'=> ($request->menu_position) ? $request->menu_position : 1,
      'slug'=>$request->slug
    ]);

    if($category){
      //Insert Category Data
      foreach ($request->title as $key => $title) {
        CategoryData::create([
          'title'=> $title,
          'meta_description'=> $request->meta_description[$key],
          'meta_keywords'=> ($request->meta_keywords[$key]) ? $request->meta_keywords[$key] : '',
          'locale'=> $key,
          'category_id'=> $category->id
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
    $categories = Category::where('parent_id',0)->get();
    $category = Category::findOrFail($id);


    return view('mAdmin.categories.edit',compact('categories','category'));
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

    $request->validate([
      'title.*'=>'required|max:255',
      'slug'=>'required'
    ]);

    //Update Category
    $category = Category::where('id',$id)
    ->update([
      'show_on_menu'=> ($request->show_on_menu) ? 1 : 0,
      'parent_id'=> ($request->parent_id) ? $request->parent_id : 0,
      'menu_position'=> ($request->menu_position) ? $request->menu_position : 1,
      'slug'=>$request->slug
    ]);

    if($category){
      //Update Category Data
      foreach ($request->title as $key => $title) {
        // CategoryData::where('category_id',$id)->where('locale',$key)
        // ->update([
        //   'title'=> $title,
        //   'meta_description'=> $request->meta_description[$key],
        //   'meta_keywords'=> ($request->meta_keywords[$key]) ? $request->meta_keywords[$key] : '',
        //   'locale'=> $key
        // ]);
      }
      return redirect()->back();
    }else{
      return redirect()->back()->withErrors(['message'=>'Something went error...']);
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
    //
  }

  /**
  * Get Sub Categories for Select
  *
  * @param  int  $category_id
  * @return Json
  */
  public function getSubCategoryForSelect($category_id){
    $getCategory = Category::select('id')->where('parent_id',$category_id)->firstOrFail();
    $getSubCategory = $getCategory->category_data[0];
    return response()->json($getSubCategory,201);
  }
}
