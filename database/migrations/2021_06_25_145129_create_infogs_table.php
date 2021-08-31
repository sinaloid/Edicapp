<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infogs', function (Blueprint $table) {
            $table->id();
            

            $table->unsignedBigInteger('data_id');
            $table->foreign('data_id')
                    ->references('id')
                    ->on('data')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            //$table->string('annee');
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
        Schema::dropIfExists('infogs');
    }
}
