<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToMaisonCertifTypeDeSurfaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maison_certif_type_de_surface', function (
            Blueprint $table
        ) {
            $table
                ->foreign('type_de_surface_id')
                ->references('id')
                ->on('type_de_surfaces')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('maison_certif_id')
                ->references('id')
                ->on('maison_certifs')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maison_certif_type_de_surface', function (
            Blueprint $table
        ) {
            $table->dropForeign(['type_de_surface_id']);
            $table->dropForeign(['maison_certif_id']);
        });
    }
}
