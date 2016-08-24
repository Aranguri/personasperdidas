<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('person_id')->unsigned();
      $table->integer('user_id')->unsigned();
      $table->text('description');
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('comments', function (Blueprint $table) {
       $table->foreign('person_id')->references('id')
       ->on('people')->onDelete('cascade');
       $table->foreign('user_id')->references('id')
       ->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('comments');
  }
}
