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
        Schema::create('activos_fijos', function (Blueprint $table) {
            $table->id();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('serie')->nullable();
            $table->enum('existencia', ['Activo', 'Dado de bajo'])->default('Activo');
            $table->boolean('eliminado')->default(false);
            $table->unsignedBigInteger('agencia_id'); // Cambiado a unsignedBigInteger para reflejar la relación

            // Clave foránea
            $table->foreign('agencia_id')->references('id')->on('agencias');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activos_fijos');
    }
};
