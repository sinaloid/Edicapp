<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCommuneIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')
                    ->references('id')
                    ->on('countries')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')
                    ->references('id')
                    ->on('regions')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')
                    ->references('id')
                    ->on('provinces')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');

            $table->unsignedBigInteger('commune_id');
            $table->foreign('commune_id')
                    ->references('id')
                    ->on('communes')
                    ->onDelete('restrict')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropcolumn('country_id');
            $table->dropcolumn('region_id');
            $table->dropcolumn('province_id');
            $table->dropcolumn('commune_id');
        });
    }
}
