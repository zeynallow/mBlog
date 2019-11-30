<?php

use Illuminate\Database\Seeder;

class UserRoleSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('user_roles')->get()->count() == 0){

      DB::table('user_roles')->insert([

        [
          'id' => '1',
          'role_name'=>'Administrator',
        ],

        [
          'id' => '2',
          'role_name'=>'Moderator',
        ],

        [
          'id' => '3',
          'role_name'=>'User',
        ],

      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
  }
}
