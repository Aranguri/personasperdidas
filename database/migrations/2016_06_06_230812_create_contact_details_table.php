<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contact_details', function (Blueprint $table) {
      $table->increments('id');
      $table->string('phone')->nullable();
      $table->string('public_email')->nullable();
      $table->string('private_email');
      $table->string('facebook')->nullable();
      $table->string('twitter')->nullable();
      $table->string('instagram')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('contact_details');
  }
}
