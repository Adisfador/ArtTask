<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_users', function (Blueprint $table) {
            $table->increments("id");
            $table->string("ip");
            $table->integer("article_id")->unsigned();


            $table->foreign("article_id")->references("article_id")->on("likes");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes_users');
    }
}
