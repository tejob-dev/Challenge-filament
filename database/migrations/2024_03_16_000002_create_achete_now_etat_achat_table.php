<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcheteNowEtatAchatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achete_now_etat_achat', function (Blueprint $table) {
            $table->unsignedBigInteger('etat_achat_id');
            $table->unsignedBigInteger('achete_now_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achete_now_etat_achat');
    }
}
