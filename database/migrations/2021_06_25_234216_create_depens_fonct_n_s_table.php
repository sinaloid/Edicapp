<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensFonctNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depens_fonct_n_s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_n_id');
            $table->foreign('budget_n_id')
                    ->references('id')
                    ->on('budget_n_s')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->string('sante');
            $table->string('appui_scolaire');
            $table->string('sport_culture');
            $table->string('eau_assainissement');
            $table->string('participation');
            $table->string('frais_financier');
            $table->string('refection_entretien');
            $table->string('salaire_indemnite');
            $table->string('entretien_vehicule');
            $table->string('appui_fonctionnement');
            $table->string('exedent_prelevement');
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
        Schema::dropIfExists('depens_fonct_n_s');
    }
}
