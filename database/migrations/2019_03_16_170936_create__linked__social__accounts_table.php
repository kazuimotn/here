<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkedSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linked_social_account', function (Blueprint $table) {
          $table->increments('id');
          $table->bigInteger('user_id');   //
          $table->string('provider_name')->nullable();  //プロバイダー名
          $table->string('provider_id',191)->unique()->nullable();  //プロバイダーに登録されているユーザーid
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
        Schema::dropIfExists('linked_social_account');
    }
}
