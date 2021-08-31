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
                    ->onDelete('cascade')
                    ->onUpdate('restrict');
                    
            $table->string('produit_exploitation')->nullable();
            $table->string('produit_domaniaux')->nullable();
            $table->string('produit_financier')->nullable();
            $table->string('recouvrement')->nullable();
            $table->string('produit_diver')->nullable();
            $table->string('impots_taxe_c_direct')->nullable();
            $table->string('impots_taxe_indirect')->nullable();
            $table->string('produit_exceptionnel')->nullable();
            $table->string('produit_anterieur')->nullable();
            $table->string('autres_dotations')->nullable();
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