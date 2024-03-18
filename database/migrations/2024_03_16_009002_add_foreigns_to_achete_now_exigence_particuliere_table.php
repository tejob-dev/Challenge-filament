<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToAcheteNowExigenceParticuliereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achete_now_exigence_particuliere', function (
            Blueprint $table
        ) {
            $table
                ->foreign('exigence_particuliere_id', 'foreign_alias_0000001')
                ->references('id')
                ->on('exigence_particulieres')
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
        Schema::table('achete_now_exigence_particuliere', function (
            Blueprint $table
        ) {
            $table->dropForeign(['exigence_particuliere_id']);
            $table->dropForeign(['achete_now_id']);
        });
    }
}
