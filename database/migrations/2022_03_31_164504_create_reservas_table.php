<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_joc')->references('id')->on('jocs');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_empleat')->nullable()->references('id')->on('users');
            $table->string('telefon');
            $table->string('day');
            $table->string('hour');
            $table->string('pais');
            $table->string('organitzacio');
            $table->boolean('isConfirmed')->nullable();
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
        Schema::dropIfExists('reservas');
    }
}
