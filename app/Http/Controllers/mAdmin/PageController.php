<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use App\Page;
use App\PageData;

class PageController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $pages=Page::orderBy('id','desc')->paginate(10);

    return view('mAdmin.pages.index',compact('pages'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return view('mAdmin.pages.create');
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
      'text.*'=>'required',
      'slug'=>'required'
    ]);

    //Create Page
    $page = Page::create([
      'publish'=> ($request->publish) ? 1 : 0,
      'slug'=>$request->slug
    ]);

    if($page){
      //Insert Page Data
      foreach ($request->title as $key => $title) {
        PageData::create([
          'title'=> $title,
          'text'=> $request->text[$key],
          'locale'=> $key,
          'page_id'=> $page->id
        ]);
      }
      return redirect()->back()->with('success','Page created successfully!');
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
    $page = Page::findOrFail($id);

    return view('mAdmin.pages.edit',compact('page'));
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
      'text.*'=>'required',
      'slug'=>'required'
    ]);

    //Update Page
    $page = Page::where('id',$id)
    ->update([
      'publish'=> ($request->publish) ? 1 : 0,
      'slug'=>$request->slug
    ]);


    if($page){
      //Update Page Data
      foreach ($request->title as $key => $title) {
        PageData::where('id',$request->page_data_id[$key])->where('locale',$key)
        ->update([
          'title'=> $title,
          'text'=> $request->text[$key],
          'locale'=> $key
        ]);
      }

      //Insert New Page Data
      if($request->n_title){
        foreach ($request->n_title as $key => $n_title) {
          PageData::create([
            'title'=> $n_title,
            'text'=> $request->n_text[$key],
            'locale'=> $key,
            'page_id'=> $id
          ]);
        }
      }

      return redirect()->route('mAdmin.pages.index')->with('success','Page updated successfully!');
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
    $delete = Page::where('id',$id)->delete();

    if($delete){
      PageData::where('page_id',$id)->delete();
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

    return redirect()->back()->with('success','Page deleted successfully!');
  }



}
