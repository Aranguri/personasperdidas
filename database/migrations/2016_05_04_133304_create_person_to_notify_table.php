<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonToNotifyTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('person_to_notify', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('person_id')->unsigned();
    });

    Schema::table('person_to_notify', function (Blueprint $table) {
      $table->foreign('person_id')->references('id')
      ->on('people')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('person_to_notify');
  }
}
