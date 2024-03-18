<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignsToCertificationTypeCertificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certification_type_certification', function (
            Blueprint $table
        ) {
            $table
                ->foreign('type_certification_id')
                ->references('id')
                ->on('type_certifications')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('certification_id')
                ->references('id')
                ->on('certifications')
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
        Schema::table('certification_type_certification', function (
            Blueprint $table
        ) {
            $table->dropForeign(['type_certification_id']);
            $table->dropForeign(['certification_id']);
        });
    }
}
