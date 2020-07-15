<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('handle')->unique();
            $table->string('bio')->nullable();
            $table->string('location')->nullable();
            $table->string('website')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('following_count')->nullable();
            $table->integer('follower_count')->nullable();
            $table->integer('likes')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('cover')->nullable();
            $table->timestamps();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
