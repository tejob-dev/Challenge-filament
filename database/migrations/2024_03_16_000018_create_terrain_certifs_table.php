<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerrainCertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terrain_certifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('telephone')->nullable();
            $table->string('email')->nullable();
            $table->string('partic_group')->nullable();
            $table->string('obj_achat')->nullable();
            $table->string('commune')->nullable();
            $table->string('surface')->nullable();
            $table->string('config_terrain')->nullable();
            $table->string('prec_config_terrain')->nullable();
            $table->string('min_budget')->nullable();
            $table->string('max_budget')->nullable();
            $table->string('financement')->nullable();
            $table->string('info_spplement')->nullable();
            $table->string('votre_poste')->nullable();
            $table->string('moment_acquis');

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
        Schema::dropIfExists('terrain_certifs');
    }
}
