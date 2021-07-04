<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            
            /*$table->string('pays');
            $table->string('region');
            $table->string('province');
            $table->string('commune');*/
            
            $table->string('organisation')->nullable();
            $table->string('role')->nullable();

            $table->bigInteger('country_id');
            $table->bigInteger('region_id');
            $table->bigInteger('province_id');
            $table->bigInteger('commune_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}