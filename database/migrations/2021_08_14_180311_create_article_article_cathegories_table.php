<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleArticleCathegoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_article_cathegories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('article_id')
                ->references('id')
                ->on('articles');
            $table->foreignId('article_cathegory_id')
                ->references('id')
                ->on('article_cathegories');
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
        Schema::dropIfExists('article_article_cathegories');
    }
}
