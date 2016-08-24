<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotifiedDevicesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('notified_devices', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('person_id')->unsigned();
      $table->string('device_id');
    });

    Schema::table('notified_devices', function (Blueprint $table) {
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
      Schema::drop('notified_devices');
  }
}
