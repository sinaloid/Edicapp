<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depens_invests', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')
                    ->references('id')
                    ->on('budgets')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                    
            $table->string('etude_recherche');
            $table->string('environnement');
            $table->string('equipement');
            $table->string('batiment');
            $table->string('emprunt');
            $table->string('autre_investissement');
            $table->string('deficit_excedent');
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
        Schema::dropIfExists('depens_invests');
    }
}
