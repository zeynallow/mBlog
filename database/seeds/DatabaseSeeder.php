<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call(AdminSeed::class);
    $this->call(SettingSeed::class);
    $this->call(UserRoleSeed::class);
    $this->call(AdsSeed::class);
    $this->call(LocaleSeed::class);
  }
}
