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
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                   
            $table->string('sante')->nullable();
            $table->string('appui_scolaire')->nullable();
            $table->string('sport_culture')->nullable();
            $table->string('participation')->nullable();
            $table->string('frais_financier')->nullable();
            $table->string('refection_entretien')->nullable();
            $table->string('salaire_indemnite')->nullable();
            $table->string('entretien_vehicule')->nullable();
            $table->string('appui_fonctionnement')->nullable();
            $table->string('autres_charges_exceptionnel')->nullable();
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
        Schema::dropIfExists('depens_foncts');
    }
}
