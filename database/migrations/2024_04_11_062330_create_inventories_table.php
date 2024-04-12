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
        if (!Schema::hasTable('inventories')) {
            Schema::create('inventories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->date('start_Date');
                $table->date('final_date');
                $table->text('details')->nullable();
                $table->integer('number_books')->nullable();
                $table->unsignedBigInteger('manager_id')->nullable();
                $table->foreign('manager_id')->references('id')->on('managers')->onDelete('set null'); 
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
