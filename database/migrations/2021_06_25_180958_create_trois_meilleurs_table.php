<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroisMeilleursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trois_meilleurs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('infog_id');
            $table->foreign('infog_id')
                    ->references('id')
                    ->on('infogs')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('marche')->nullable();
            $table->string('attendu')->nullable();
            $table->string('contribution')->nullable();
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
        Schema::dropIfExists('trois_meilleurs');
    }
}
