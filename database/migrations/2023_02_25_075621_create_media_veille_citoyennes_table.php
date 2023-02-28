<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaVeilleCitoyennesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_veille_citoyennes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veille_citoyenne_id');
            $table->foreign('veille_citoyenne_id')
                    ->references('id')
                    ->on('veille_citoyennes')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                   
            $table->string('url')->nullable();
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
        Schema::dropIfExists('media_veille_citoyennes');
    }
}
