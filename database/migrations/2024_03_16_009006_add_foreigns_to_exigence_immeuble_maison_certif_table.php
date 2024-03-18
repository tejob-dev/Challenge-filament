<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToExigenceImmeubleMaisonCertifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('exigence_immeuble_maison_certif', function (
            Blueprint $table
        ) {
            $table
                ->foreign('exigence_immeuble_id')
                ->references('id')
                ->on('exigence_immeubles')
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
        Schema::table('exigence_immeuble_maison_certif', function (
            Blueprint $table
        ) {
            $table->dropForeign(['exigence_immeuble_id']);
            $table->dropForeign(['maison_certif_id']);
        });
    }
}
