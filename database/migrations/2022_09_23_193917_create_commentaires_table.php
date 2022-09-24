<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->text('commentaire');
            $table->timestamps();

            $table->unsignedBigInteger('membre_id');
            $table->foreign('membre_id')
                    ->references('id')
                    ->on('membres')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('sujet_id');
            $table->foreign('sujet_id')
                    ->references('id')
                    ->on('sujets')
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
        Schema::dropIfExists('commentaires');
    }
}
