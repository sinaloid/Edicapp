<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepensInvestNSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depens_invest_n_s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_n_id');
            $table->foreign('budget_n_id')
                    ->references('id')
                    ->on('budget_n_s')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            $table->string('etude_recherche')->nullable();
            $table->string('environnement')->nullable();
            $table->string('equipement')->nullable();
            $table->string('batiment')->nullable();
            $table->string('emprunt')->nullable();
            $table->string('autre_investissement')->nullable();
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
        Schema::dropIfExists('depens_invest_n_s');
    }
}
