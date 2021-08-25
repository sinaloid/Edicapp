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

            $table->string('sante')->nullable();
            $table->string('appui_scolaire')->nullable();
            $table->string('sport_culture')->nullable();
            $table->string('eau_assainissement')->nullable();
            $table->string('participation')->nullable();
            $table->string('frais_financier')->nullable();
            $table->string('refection_entretien')->nullable();
            $table->string('salaire_indemnite')->nullable();
            $table->string('entretien_vehicule')->nullable();
            $table->string('appui_fonctionnement')->nullable();
            $table->string('exedent_prelevement')->nullable();
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
