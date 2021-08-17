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
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                    
            $table->string('naissance_nombre');
            $table->string('naissance_observation');
            $table->string('acte_de_naissance_nombre');
            $table->string('acte_de_naissance_observation');
            $table->string('acte_de_deces_nombre');
            $table->string('acte_de_deces_observation');
            $table->string('mariage_celebre_nombre');
            $table->string('mariage_celebre_observation');
            $table->string('autre_acte_nombre');
            $table->string('autre_acte_nombre_observation');
            $table->string('vente_timbre_nombre');
            $table->string('vente_timbre_observation');
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
