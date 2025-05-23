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
        Schema::create('toners', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_unico')->unique();
            $table->string('modelo'); // 85A, 78A, etc.
            $table->enum('estado', ['disponible', 'instalado', 'usado', 'dañado'])->default('disponible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('toners');
    }
};
