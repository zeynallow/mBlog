<?php

use Illuminate\Database\Seeder;

class AdsSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('ads')->get()->count() == 0){

      DB::table('ads')->insert([

        [
          'ads_position' => 'home_top',
          'description'=>'Home Top (728x90)'
        ],
        [
          'ads_position' => 'home_bottom',
          'description'=>'Home Bottom (728x90)'
        ],
        [
          'ads_position' => 'sidebar',
          'description'=>'Sidebar (300x250)'
        ],
        [
          'ads_position' => 'post_top',
          'description'=>'Post Top (728x90)'
        ],
        [
          'ads_position' => 'post_bottom',
          'description'=>'Post Bottom (728x90)'
        ],
        [
          'ads_position' => 'category_top',
          'description'=>'Category Top (728x90)'
        ],
        [
          'ads_position' => 'category_bottom',
          'description'=>'Category Bottom (728x90)'
        ],
        [
          'ads_position' => 'page_top',
          'description'=>'Page Top (728x90)'
        ],
        [
          'ads_position' => 'page_bottom',
          'description'=>'Page Bottom (728x90)'
        ],

      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
  }
}
