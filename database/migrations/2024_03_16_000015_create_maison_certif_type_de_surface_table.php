<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaisonCertifTypeDeSurfaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maison_certif_type_de_surface', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('type_de_surface_id');
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
        Schema::dropIfExists('maison_certif_type_de_surface');
    }
}
