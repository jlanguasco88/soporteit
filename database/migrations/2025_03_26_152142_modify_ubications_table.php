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
        Schema::table('ubications', function (Blueprint $table) {
            // Eliminar los campos 'area' y 'puesto'
            $table->dropColumn('area');
            $table->dropColumn('puesto');
            
            // Agregar el campo 'ip'
            $table->string('ip')->nullable()->after('usuario');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ubications', function (Blueprint $table) {
            // Volver a agregar 'area' y 'puesto'
            $table->string('area');
            $table->string('puesto');
            
            // Eliminar el campo 'ip'
            $table->dropColumn('ip');
        });
    }
};
