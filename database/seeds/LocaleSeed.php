<?php

use Illuminate\Database\Seeder;

class LocaleSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('locales')->get()->count() == 0){

      DB::table('locales')->insert([

        [
          'code' => 'en',
          'name'=>'en',
          'default'=>'1',
        ],

      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
  }
}
