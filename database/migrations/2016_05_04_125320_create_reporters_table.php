<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('reporters', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('person_id')->unsigned();
        $table->string('reporter_name')->nullable();
        $table->string('relationship')->nullable();
        $table->string('phone')->nullable();
        $table->string('alt_phone')->nullable();
        $table->string('email')->nullable();
        $table->string('alt_contact')->nullable();
    });

    Schema::table('reporters', function (Blueprint $table) {
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
    Schema::drop('reporters');
  }
}
