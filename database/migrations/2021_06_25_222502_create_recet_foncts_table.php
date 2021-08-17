<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetFonctsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recet_foncts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('budget_id');
            $table->foreign('budget_id')
                    ->references('id')
                    ->on('budgets')
                    ->onDelete('restrict')
                    ->onUpdate('restrict');
                    
            $table->string('produit_exploitation');
            $table->string('produit_domaniaux');
            $table->string('produit_financier');
            $table->string('recouvrement');
            $table->string('produit_diver');
            $table->string('impots_taxe_c_direct');
            $table->string('impots_taxe_indirect');
            $table->string('produit_exceptionnel');
            $table->string('produit_anterieur');
            $table->string('autres_dotations');
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
        Schema::dropIfExists('recet_foncts');
    }
}