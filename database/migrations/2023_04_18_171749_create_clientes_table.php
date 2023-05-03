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
        Schema::create('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono', '50');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->rememberToken();

            $table->primary('id');
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
