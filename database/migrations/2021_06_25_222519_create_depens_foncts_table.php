<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensFonctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depens_foncts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')
                    ->references('id')
                    ->on('budgets')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                   
            $table->string('sante');
            $table->string('appui_scolaire');
            $table->string('sport_culture');
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
        Schema::dropIfExists('depens_foncts');
    }
}
