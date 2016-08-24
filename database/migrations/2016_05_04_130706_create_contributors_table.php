<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributorsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contributors', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('contribution_id')->unsigned();
      $table->string('name')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
    });

    Schema::table('contributors', function (Blueprint $table) {
      $table->foreign('contribution_id')->references('id')
      ->on('contributions')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('contributors');
  }
}
