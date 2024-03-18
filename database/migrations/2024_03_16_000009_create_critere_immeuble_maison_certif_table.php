<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCritereImmeubleMaisonCertifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('critere_immeuble_maison_certif', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('critere_immeuble_id');
            $table->unsignedBigInteger('maison_certif_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('critere_immeuble_maison_certif');
    }
}
