<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtatCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etat_civils', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('infog_id');
            $table->foreign('infog_id')
                    ->references('id')
                    ->on('infogs')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('naissance_nombre')->nullable();
            $table->string('naissance_observation')->nullable();
            $table->string('acte_de_naissance_nombre')->nullable();
            $table->string('acte_de_naissance_observation')->nullable();
            $table->string('acte_de_deces_nombre')->nullable();
            $table->string('acte_de_deces_observation')->nullable();
            $table->string('mariage_celebre_nombre')->nullable();
            $table->string('mariage_celebre_observation')->nullable();
            $table->string('autre_acte_nombre')->nullable();
            $table->string('autre_acte_nombre_observation')->nullable();
            $table->string('vente_timbre_nombre')->nullable();
            $table->string('vente_timbre_observation')->nullable();
            //$table->string('slug');
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
        Schema::dropIfExists('etat_civils');
    }
}
