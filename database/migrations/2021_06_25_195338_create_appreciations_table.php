<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppreciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appreciations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pcd_id');
            $table->foreign('pcd_id')
                    ->references('id')
                    ->on('pcds')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('date_de_conception')->nullable();
            $table->string('date_d_expiration')->nullable();
            $table->string('montant_total')->nullable();
            $table->string('montant_mobilise')->nullable();
            $table->string('probleme_majeur')->nullable();
            $table->string('perpective_dix_mot')->nullable();
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
        Schema::dropIfExists('appreciations');
    }
}
