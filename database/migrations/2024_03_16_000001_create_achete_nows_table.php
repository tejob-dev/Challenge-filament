<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcheteNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achete_nows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('ou_recherchez_vous')->nullable();
            $table->string('typelogement')->nullable();
            $table->string('surface-recherch')->nullable();
            $table->string('min_budget')->nullable();
            $table->string('max_budget')->nullable();
            $table->string('nbr_piece')->nullable();
            $table->string('nbr_chambre')->nullable();
            $table->string('surface')->nullable();
            $table->string('criter_appart')->nullable();
            $table->string('filtrag_annonce');

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
        Schema::dropIfExists('achete_nows');
    }
}
