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
         Schema::create('jugadors', function (Blueprint $table) {
    $table->id();
    $table->string('nombre');
    $table->integer('edad');
    $table->string('posicion');
    $table->integer('numero');
    $table->foreignId('equipo_id')->constrained();
    $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jugadors');
    }
};
