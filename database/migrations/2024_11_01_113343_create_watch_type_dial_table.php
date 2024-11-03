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
        Schema::create('watch_type_dial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('watch_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('dial_id')->constrained('watch_dials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_type_dial');
    }
};
