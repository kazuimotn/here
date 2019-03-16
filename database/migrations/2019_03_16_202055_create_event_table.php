<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->bigIncrements('id');  //イベントid
            $table->double('longitude');  //緯度
            $table->double('latitude');   //経度
            $table->integer('user_id');   //ユーザーid
            $table->string('user_name');   //ユーザー名前
            $table->integer('start_time');     //何時からか
            $table->timestamps();         //登録日時
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}
