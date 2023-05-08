<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string("reference");
            $table->string("distination");
            $table->integer("quantité");
            $table->integer("remise");
            $table->integer("montant");
            $table->integer("total_hors_taxe");
            $table->integer("total_fodac");
            $table->integer("total_tva");
            $table->integer("total_timbre");
            $table->integer("total_ttc");
            $table
            ->bigInteger("client_id")
            ->unsigned()
            ->nullable();
     

        // FKs
        $table
            ->foreign("client_id")
            ->references("id")
            ->on("clients")
            ->onDelete("cascade");
        $table
            ->bigInteger("fournisseur_id")
            ->unsigned()
            ->nullable();
      

        // FKs
        $table
            ->foreign("fournisseur_id")
            ->references("id")
            ->on("fournisseurs")
            ->onDelete("cascade");
        $table
                ->bigInteger("article_id")
                ->unsigned()
                ->nullable();
        $table->timestamps();

         // FKs
         $table
                ->foreign("article_id")
                ->references("id")
                ->on("articles")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
