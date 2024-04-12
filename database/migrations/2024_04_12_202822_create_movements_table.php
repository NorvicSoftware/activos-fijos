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
        Schema::create('movements', function (Blueprint $table) {
            $table->id(); 
            $table->date('date'); 
            $table->text('detail'); 
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('agency_previous_id')->nullable(); 
            $table->unsignedBigInteger('agency_current_id'); 

            $table->timestamps(); 

    
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade'); 
            $table->foreign('agency_previous_id')->references('id')->on('agencies')->onDelete('set null');
            $table->foreign('agency_current_id')->references('id')->on('agencies')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
