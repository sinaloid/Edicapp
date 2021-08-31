<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatisfactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satisfactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pcd_id');
            $table->foreign('pcd_id')
                    ->references('id')
                    ->on('pcds')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('reforme_tres_satisfaisant')->nullable();
            $table->string('reforme_satisfaisant')->nullable();
            $table->string('reforme_pas_satisfaisant')->nullable();
            $table->string('developper_tres_satisfaisant')->nullable();
            $table->string('developper_satisfaisant')->nullable();
            $table->string('developper_pas_satisfaisant')->nullable();
            $table->string('dynamiser_tres_satisfaisant')->nullable();
            $table->string('dynamiser_satisfaisant')->nullable();
            $table->string('dynamiser_pas_satisfaisant')->nullable();
            $table->string('commentaire_appreciation')->nullable();
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
        Schema::dropIfExists('satisfactions');
    }
}
