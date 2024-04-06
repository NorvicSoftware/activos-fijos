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
        if (!Schema::hasTable('inventarios')) {
            Schema::create('inventarios', function (Blueprint $table) {
                $table->id();
                $table->string('Nombre');
                $table->date('fecha_inicio');
                $table->date('fecha_final');
                $table->text('detalle')->nullable();
                $table->integer('cantidad_leidos')->nullable();
                $table->unsignedBigInteger('encargado_id');
                $table->foreign('encargado_id')->references('id')->on('encargados');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
