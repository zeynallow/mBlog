<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
use Auth;
use Validator;
use Image;

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
  * visualUpdate
  */
  public function visualUpdate(Request $request)
  {
    $site_logo=[];
    $site_favicon=[];
    $s_site_logo=[];
    $s_site_favicon=[];

    $_site_logo = $this->imageStore($request->file('site_logo'));
    $_site_favicon = $this->imageStore($request->file('site_favicon'));

    if($_site_logo){
      $s_site_logo = ['site_logo'];
      $site_logo = ['site_logo'=>$_site_logo];
    }

    if($_site_favicon){
      $s_site_favicon = ['site_favicon'];
      $site_favicon = ['site_favicon'=>$_site_favicon];
    }

    $updateSetting = $this->updateSetting(
      array_merge([
        'primary_font',
        'secondary_font',
        'site_color'
      ],
      $s_site_logo,
      $s_site_favicon),

      array_merge([
        'primary_font'=>$request->primary_font,
        'secondary_font'=>$request->secondary_font,
        'site_color'=>$request->site_color
      ],
      $site_logo,
      $site_favicon)
    );

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

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
  * otherUpdate
  */
  public function otherUpdate(Request $request)
  {

    $updateSetting = $this->updateSetting([
      'google_analytics',
      'custom_head_code'],$request->all()
    );

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }

  /*
  * email
  */
  public function email()
  {
    return view('mAdmin.settings.email');
  }


  /*
  * emailUpdate
  */
  public function emailUpdate(Request $request)
  {

    $updateSetting = $this->updateSetting([
      'email_protocol',
      'email_title',
      'email_host',
      'email_title',
      'email_username',
      'email_password'
    ],$request->all()
  );

  if($updateSetting){
    return redirect()->back()->with('success','Settings updated successfully!');
  }

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

/*
* imageStore
*/
private function imageStore($file){
  //Validation
  $validator = Validator::make(['f'=>$file], [
    'f' => 'max:10000|mimes:jpg,jpeg,gif,bmp,png,svg'
  ]);

  if($validator->fails()){
    return false;
  }

  $fileName = $file->getClientOriginalName();
  $fileExt = strtolower($file->getClientOriginalExtension());
  $directory = '/files/site';
  $file->move(public_path($directory),$fileName);
  return "$directory/$fileName";
}

}
