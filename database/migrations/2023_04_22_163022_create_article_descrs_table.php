<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleDescrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_descrs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("article_id")->unsigned();
            $table->string('img');
            $table->text('descr');

            $table->foreign("article_id")->references("id")->on("articles");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_descrs');
    }
}
