<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExigenceImmeubleMaisonCertifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exigence_immeuble_maison_certif', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('exigence_immeuble_id');
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
        Schema::dropIfExists('exigence_immeuble_maison_certif');
    }
}
