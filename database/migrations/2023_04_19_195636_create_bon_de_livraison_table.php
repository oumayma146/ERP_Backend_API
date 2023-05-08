<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonDeLivraisonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bon_de_livraison', function (Blueprint $table) {
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
            ->bigInteger("commande_id")
            ->unsigned()
            ->nullable();
     

        // FKs
        $table
            ->foreign("commande_id")
            ->references("id")
            ->on("commandes")
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
        Schema::dropIfExists('_bon_de_livraison');
    }
}
