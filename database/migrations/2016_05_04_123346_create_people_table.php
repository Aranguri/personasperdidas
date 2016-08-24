<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('people', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('surname');
      $table->string('nickname')->nullable();
      $table->integer('birth_year')->nullable();
      $table->text('characteristics')->nullable();
      $table->string('gender')->nullable();
      $table->integer('country_id')->unsigned();
      $table->integer('province_id')->unsigned()->nullable();
      $table->string('area')->nullable();
      $table->string('address')->nullable();
      $table->double('latitude')->nullable();
      $table->double('longitude')->nullable();
      $table->string('clothes')->nullable();
      $table->string('diseases')->nullable();
      $table->text('observations')->nullable();
      $table->text('image_comment')->nullable();
      $table->string('previous_id')->nullable();
      $table->string('previous_description')->nullable();
      $table->date('missing_at')->nullable();
      $table->date('found_at')->nullable();
      $table->date('closure_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
      $table->string('status');
    });

    Schema::table('people', function (Blueprint $table) {
      $table->foreign('country_id')->references('id')
      ->on('countries')->onDelete('cascade');
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
    Schema::drop('people');
  }
}
