<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcheteNowExigenceParticuliereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achete_now_exigence_particuliere', function (
            Blueprint $table
        ) {
            $table->unsignedBigInteger('exigence_particuliere_id');
            $table->unsignedBigInteger('achete_now_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achete_now_exigence_particuliere');
    }
}
