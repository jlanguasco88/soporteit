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
        Schema::create('ubications', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('puesto');
            $table->string('usuario');
            $table->string('nombreRed')->nullable();
            $table->string('grupoRed')->nullable();
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubications');
    }
};
