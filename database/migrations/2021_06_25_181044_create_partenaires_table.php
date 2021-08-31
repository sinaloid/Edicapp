<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartenairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenaires', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('infog_id');
            $table->foreign('infog_id')
                    ->references('id')
                    ->on('infogs')
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('identite_ptf')->nullable();
            $table->string('evaluation_contribution')->nullable();
            $table->string('principale_action')->nullable();
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
        Schema::dropIfExists('partenaires');
    }
}
