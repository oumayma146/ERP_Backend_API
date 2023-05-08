<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandeHasArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_has_article', function (Blueprint $table) {
                $table->integer('commande_id')->unsigned();
                $table->integer('article_id')->unsigned();
    
                $table->foreign('commande_id')->references('id')->on('commandes')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('article_id')->references('id')->on('articles')
                    ->onUpdate('cascade')->onDelete('cascade');
    
                $table->primary(['commande_id', 'article_id']);
            });
    
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_has_article');
    }
}
