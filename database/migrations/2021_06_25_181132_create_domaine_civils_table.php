<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomaineCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domaine_civils', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('infog_id');
            $table->foreign('infog_id')
                    ->references('id')
                    ->on('infogs')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                   
            $table->string('zone_habitation_parcelle_degagee');
            $table->string('zone_habitation_parcelle_attribuee');
            $table->string('zone_habitation_parcelle_restante');
            $table->string('zone_commerciale_parcelle_degagee');
            $table->string('zone_commerciale_parcelle_attribuee');
            $table->string('zone_commerciale_parcelle_restante');
            $table->string('zone_administrative_parcelle_degagee');
            $table->string('zone_administrative_parcelle_attribuee');
            $table->string('zone_administrative_parcelle_restante');
            $table->string('zone_autre_parcelle_degagee');
            $table->string('zone_autre_parcelle_attribuee');
            $table->string('zone_autre_parcelle_restante');
            $table->string('surface_degagee');
            $table->string('surface_attribuee');
            $table->string('surface_restante');
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
        Schema::dropIfExists('domaine_civils');
    }
}
