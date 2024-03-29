<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacebookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('face', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('email',191)->unique()->nullable();
          $table->string('prof_image')->default('imag.png');   //デフォルトを設定しておく必要あり
          $table->year('birth_year')->nullable();
          $table->integer('birth_month')->nullable();
          $table->integer('birth_day')->nullable();
          $table->integer('point')->default(0);
          $table->integer('sex')->nullable();
          $table->timestamp('email_verified_at')->nullable();
          $table->string('password')->nullable();
          $table->rememberToken();
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
        Schema::dropIfExists('face');
    }
}
