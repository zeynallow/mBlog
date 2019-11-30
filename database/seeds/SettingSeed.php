<?php

use Illuminate\Database\Seeder;

class SettingSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('settings')->get()->count() == 0){

      DB::table('settings')->insert([

        [
          'key' => 'site_name',
          'value'=>'mBlog',
        ],

        [
          'key' => 'multilingual_system',
          'value'=>'1',
        ],

        [
          'key' => 'comment_system',
          'value'=>'1',
        ],

        [
          'key' => 'feature_post',
          'value'=>'1',
        ],

        [
          'key' => 'pagination_per_page',
          'value'=>'10',
        ],

        [
          'key' => 'about_footer',
          'value'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua',
        ],

        [
          'key' => 'copyright_footer',
          'value'=>'&copy; 2019 mazZapp! - mBlog',
        ],

        [
          'key' => 'facebook_link',
          'value'=>'https://facebook.com',
        ],

        [
          'key' => 'twitter_link',
          'value'=>'https://twitter.com',
        ],

        [
          'key' => 'instagram_link',
          'value'=>'https://instagram.com',
        ],

        [
          'key' => 'pinterest_link',
          'value'=>'https://pinterest.com',
        ],

        [
          'key' => 'linkedin_link',
          'value'=>'https://linkedin.com',
        ],

        [
          'key' => 'site_color',
          'value'=>'default',
        ],

        [
          'key' => 'site_logo',
          'value'=>'/files/site/logo.svg',
        ],

        [
          'key' => 'site_favicon',
          'value'=>'/files/site/android-icon-96x96.png',
        ],

        [
          'key' => 'site_name',
          'value'=>'mBlog',
        ],

        [
          'key' => 'google_analytics',
          'value'=>'',
        ],

        [
          'key' => 'custom_head_code',
          'value'=>'',
        ],

        [
          'key' => 'email_protocol',
          'value'=>'SMTP',
        ],

        [
          'key' => 'email_title',
          'value'=>'mBlog',
        ],

        [
          'key' => 'email_host',
          'value'=>'',
        ],

        [
          'key' => 'email_port',
          'value'=>'587',
        ],

        [
          'key' => 'email_username',
          'value'=>'',
        ],

        [
          'key' => 'email_password',
          'value'=>'',
        ],

        [
          'key' => 'email_address',
          'value'=>'',
        ],

        [
          'key' => 'timezone',
          'value'=>'UTC',
        ],

        [
          'key' => 'site_url',
          'value'=>'',
        ],

        [
          'key' => 'meta_keywords',
          'value'=>'',
        ],

        [
          'key' => 'meta_description',
          'value'=>'',
        ],

        [
          'key' => 'fb_app_id',
          'value'=>'',
        ],

      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
  }
}
