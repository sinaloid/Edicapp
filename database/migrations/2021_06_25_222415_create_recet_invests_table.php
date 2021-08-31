<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recet_invests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')
                    ->references('id')
                    ->on('budgets')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                   
            $table->string('dotation_globale')->nullable();
            $table->string('subvention_equipement')->nullable();
            $table->string('contribution_propre')->nullable();
            $table->string('dotation_liee')->nullable();
            $table->string('resultat_exercice')->nullable();
            $table->string('autre_subvention')->nullable();
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
        Schema::dropIfExists('recet_invests');
    }
}
