<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageDataTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('page_data', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('page_id')->unsigned();
      $table->string('locale')->index();

      $table->string('title');
      $table->text('text');

      $table->unique(['page_id','locale']);
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('page_data');
  }
}
