<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContributionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contributions', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('person_id')->unsigned();
      $table->integer('country_id')->unsigned()->nullable();
      $table->integer('province_id')->unsigned()->nullable();
      $table->string('area')->nullable();
      $table->string('address')->nullable();
      $table->text('characteristics')->nullable();
      $table->string('clothes')->nullable();
      $table->text('observations')->nullable();
      $table->date('found_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });

    Schema::table('contributions', function (Blueprint $table) {
      $table->foreign('person_id')->references('id')
      ->on('people')->onDelete('cascade');
      $table->foreign('province_id')->references('id')
      ->on('provinces')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::drop('contributions');
  }
}
