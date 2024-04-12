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

            $table->string('description');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('series')->nullable();
            $table->boolean('exists')->default(true);
            $table->enum('status', ['Active', 'Down'])->default('Active');

            $table->timestamps();
            //$table->unsignedBigInteger('agency_id');

            /* Clave foranea
            $table->foreign('agency_id')->references('id')->on('agencies');
            */
            

        
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
