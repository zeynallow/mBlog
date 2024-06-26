<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostDataTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('post_data', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->integer('post_id')->unsigned()->index();
      $table->string('locale')->index();

      $table->string('title');
      $table->text('text');

      $table->unique(['post_id','locale']);

    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('post_data');
  }
}
