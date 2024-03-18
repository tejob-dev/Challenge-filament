<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaisonCertifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maison_certifs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_prenom');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('typelogement')->nullable();
            $table->string('nbr_chambre')->nullable();
            $table->string('nbr_salle')->nullable();
            $table->string('moment_acquis')->nullable();
            $table->string('ma_preference')->nullable();
            $table->string('surface_habitable')->nullable();
            $table->string('commune')->nullable();
            $table->string('type_construction')->nullable();
            $table->string('budget')->nullable();
            $table->string('autre_budget')->nullable();
            $table->string('type_emploi')->nullable();
            $table->string('proprietaire')->nullable();

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
        Schema::dropIfExists('maison_certifs');
    }
}
