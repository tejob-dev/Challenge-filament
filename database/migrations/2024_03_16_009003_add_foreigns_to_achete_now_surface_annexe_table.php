<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAcheteNowSurfaceAnnexeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achete_now_surface_annexe', function (Blueprint $table) {
            $table
                ->foreign('surface_annexe_id')
                ->references('id')
                ->on('surface_annexes')
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
        Schema::table('achete_now_surface_annexe', function (Blueprint $table) {
            $table->dropForeign(['surface_annexe_id']);
            $table->dropForeign(['achete_now_id']);
        });
    }
}
