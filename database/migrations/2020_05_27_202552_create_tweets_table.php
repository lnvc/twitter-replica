<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->longText('tweet');
            $table->integer('favorite_count')->default(0);
            $table->integer('retweet_count')->default(0);
            $table->integer('reply_count')->nullable();
            $table->boolean('is_reply')->nullable();
            $table->unsignedBigInteger('reply_to')->nullable();
            $table->timestamps();
        });

        Schema::table('tweets', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
