<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_planes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plan_adquirido_id');

            $table->foreign('plan_adquirido_id')->references('id')->on('planes_adquiridos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_planes');
    }
};
