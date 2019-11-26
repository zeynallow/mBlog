<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Auth;
use App\Setting;

class SettingController extends Controller
{


  /*
  * general
  */
  public function general()
  {
    return view('mAdmin.settings.general');
  }

  /*
  * generalUpdate
  */
  public function generalUpdate(Request $request)
  {

    $updateSetting = $this->updateSetting([
      'site_name',
      'multilingual_system',
      'comment_system',
      'feature_post',
      'pagination_per_page',
      'about_footer',
      'copyright_footer'],$request->all()
    );

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }

  /*
  * visual
  */
  public function visual()
  {
    return view('mAdmin.settings.visual');
  }

  /*
  * social
  */
  public function social()
  {
    return view('mAdmin.settings.social');
  }

  /*
  * socialUpdate
  */
  public function socialUpdate(Request $request)
  {

    $updateSetting = $this->updateSetting([
      'facebook_link',
      'twitter_link',
      'instagram_link',
      'pinterest_link',
      'linkedin_link'],$request->all()
    );

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }

  /*
  * other
  */
  public function other()
  {
    return view('mAdmin.settings.other');
  }

  /*
  * email
  */
  public function email()
  {
    return view('mAdmin.settings.email');
  }


  /*
  * updateSetting
  */
  private function updateSetting($datas,$request){

    if(count($datas)){
      foreach ($datas as $data) {
        Setting::where('key',$data)->update(['value'=>$request[$data]]);
      }
      return true;
    }else{
      return false;
    }
  }

}
