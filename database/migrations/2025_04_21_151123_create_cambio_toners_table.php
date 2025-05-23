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
        Schema::create('cambio_toners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('impresora_id')->constrained('impresoras');
            $table->foreignId('toner_id')->constrained('toners');
            $table->date('fecha_cambio');
            $table->integer('contador_paginas');
            $table->enum('motivo', ['Toner bajo', 'Falla', 'Otro']);
            $table->integer('paginas_impresas')->nullable();
            $table->integer('duracion_dias')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cambio_toners');
    }
};
