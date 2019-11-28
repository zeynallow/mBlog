<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ads;

class AdsController extends Controller
{

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $ads=Ads::all();

    return view('mAdmin.ads.index',compact('ads'));
  }
  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $ads = Ads::findOrFail($id);

    return view('mAdmin.ads.edit',compact('ads'));
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

    //Update Ads
    $ads = Ads::where('id',$id)
    ->update([
      'publish'=> ($request->publish) ? 1 : 0,
      'ads_code'=>$request->ads_code
    ]);

    if($ads){
      return redirect()->route('mAdmin.ads.index')->with('success','Ads updated successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }
  }

  /**
  * Disable Ads
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function disable($id)
  {
    $update = Ads::where('id',$id)->update(['publish'=>0]);

    if($update){
      return redirect()->back()->with('success','Ads disabled successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

  }

  /**
  * Enable Ads
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function enable($id)
  {
    $update = Ads::where('id',$id)->update(['publish'=>1]);

    if($update){
      return redirect()->back()->with('success','Ads enabled successfully!');
    }else{
      return redirect()->back()->with('error','Something went error...');
    }

  }



}
