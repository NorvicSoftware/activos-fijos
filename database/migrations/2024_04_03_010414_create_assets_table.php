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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 75);
            $table->string('code', 15);
            $table->text('description')->nullable();
            $table->string('branch')->nullable();
            $table->string('model')->nullable();
            $table->string('number_serial')->nullable();
            $table->enum('exist', ['Activo', 'Dado de bajo'])->default('Activo');
            $table->boolean('status')->default(false);
            
            $table->unsignedBigInteger('agency_id'); 
            $table->foreign('agency_id')->references('id')->on('agencies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
