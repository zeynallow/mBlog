<?php

namespace App\Http\Controllers\mAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use App;
use Auth;
use Validator;
use Image;
use DateTimeZone;
use Cache;

use App\Setting;

class SettingController extends Controller
{


  /*
  * general
  */
  public function general()
  {
    $timezonelist = DateTimeZone::listIdentifiers(DateTimeZone::ALL);
    return view('mAdmin.settings.general',compact('timezonelist'));
  }

  /*
  * generalUpdate
  */
  public function generalUpdate(Request $request)
  {
    $settings = [
      'site_name',
      'multilingual_system',
      'comment_system',
      'feature_post',
      'pagination_per_page',
      'site_url',
      'timezone',
      'about_footer',
      'copyright_footer'
    ];

    $updateSetting = $this->updateSetting($settings,$request->all()); //update data
    $this->cacheClear($settings); //cache clear

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

    $settings = [
      'site_color'
    ];

    $updateSetting = $this->updateSetting(
      array_merge($settings,$s_site_logo,$s_site_favicon),

      array_merge([
        'site_color'=>$request->site_color
      ],
      $site_logo,
      $site_favicon)
    );

    $this->cacheClear($settings); //cache clear

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

    $settings= [
      'facebook_link',
      'twitter_link',
      'instagram_link',
      'pinterest_link',
      'linkedin_link'
    ];

    $updateSetting = $this->updateSetting($settings,$request->all());
    $this->cacheClear($settings); //cache clear

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

    $settings = [
      'google_analytics',
      'custom_head_code',
      'fb_app_id'
    ];

    $updateSetting = $this->updateSetting($settings,$request->all());
    $this->cacheClear($settings); //cache clear

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }


  /*
  * seo
  */
  public function seo()
  {
    return view('mAdmin.settings.seo');
  }

  /*
  * seoUpdate
  */
  public function seoUpdate(Request $request)
  {

    $settings = [
      'meta_keywords',
      'meta_description'
    ];

    $updateSetting = $this->updateSetting($settings,$request->all());
    $this->cacheClear($settings); //cache clear

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }

  /*
  * email
  */
  public function email()
  {
    // $this->setEnv('MAIL_PORT',465);
    return view('mAdmin.settings.email');
  }


  /*
  * emailUpdate
  */
  public function emailUpdate(Request $request)
  {
    $settings = [
      'email_protocol',
      'email_title',
      'email_address',
      'email_host',
      'email_title',
      'email_username',
      'email_password'
    ];

    $updateSetting = $this->updateSetting($settings,$request->all());
    $this->cacheClear($settings); //cache clear

    if($updateSetting){
      return redirect()->back()->with('success','Settings updated successfully!');
    }

  }

  /*
  * setting cache clear
  */
  private function cacheClear($keys){
    foreach ($keys as $key) {
      Cache::forget("setting.{$key}");
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
