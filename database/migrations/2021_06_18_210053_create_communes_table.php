<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');


            $table->string('commune_name');
            $table->string('superficie');
            $table->string('total_population');
            $table->string('total_homme');
            $table->string('total_femme');
            $table->string('slug');


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
        Schema::dropIfExists('communes');
    }
}
