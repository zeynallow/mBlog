<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    if(DB::table('users')->get()->count() == 0){

      DB::table('users')->insert([
        [
          'name' => 'Admin',
          'email'=>'admin@admin.com',
          'password'=>'$2y$10$ufZsFWrMBdnD4QXD8IjQCOEbzZvJ7HETBr7kJB7n7qY2eCBGG.WIS', // password
          'role_id'=>'1'
        ],

      ]);

    } else { echo "\e[31mTable is not empty, therefore NOT "; }
  }
}
