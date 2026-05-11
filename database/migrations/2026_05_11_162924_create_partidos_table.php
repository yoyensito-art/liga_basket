<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partidos', function (Blueprint $table) {

    $table->id();

    $table->foreignId('equipo_local_id')->constrained('equipos');

    $table->foreignId('equipo_visitante_id')->constrained('equipos');

    $table->integer('puntos_local');

    $table->integer('puntos_visitante');

    $table->date('fecha');

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
