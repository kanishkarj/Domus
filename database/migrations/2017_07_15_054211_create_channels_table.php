<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('user_id');
            $table->string('caption');
            $table->string('avatar');
            $table->string('slug');
            $table->timestamps();
        });
        Schema::create('channels_post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channels_id');
            $table->string('post_id');
            $table->timestamps();
        });
        Schema::create('channels_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('channels_id');
            $table->string('user_id');
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
        Schema::dropIfExists('channels');
    }
}
