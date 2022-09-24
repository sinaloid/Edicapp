<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSujetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description');
            $table->bigInteger('nombre_reponse')->default(0);
            $table->bigInteger('nombre_vue')->default(0);
            $table->string('slug');
            $table->timestamps();

            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id')
                    ->references('id')
                    ->on('communes')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('membre_id');
            $table->foreign('membre_id')
                    ->references('id')
                    ->on('membres')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sujets');
    }
}
