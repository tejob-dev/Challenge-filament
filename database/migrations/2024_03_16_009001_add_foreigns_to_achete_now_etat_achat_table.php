<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAcheteNowEtatAchatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achete_now_etat_achat', function (Blueprint $table) {
            $table
                ->foreign('etat_achat_id')
                ->references('id')
                ->on('etat_achats')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('achete_now_id')
                ->references('id')
                ->on('achete_nows')
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
        Schema::table('achete_now_etat_achat', function (Blueprint $table) {
            $table->dropForeign(['etat_achat_id']);
            $table->dropForeign(['achete_now_id']);
        });
    }
}
