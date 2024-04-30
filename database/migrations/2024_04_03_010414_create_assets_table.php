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
            $table->string('description')->nullable();
            $table->string('brand', 75)->nullable();
            $table->string('model', 75)->nullable();
            $table->string('series', 35)->nullable();
            $table->boolean('checked')->default(false);
            $table->enum('status', ['Activo', 'Pasivo'])->default('Activo');

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
        Schema::dropIfExists('Assest');
    }
};