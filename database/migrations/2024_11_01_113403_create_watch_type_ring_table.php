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
        Schema::create('watch_ring_watch_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('watch_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('watch_ring_id')->constrained('watch_rings')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('watch_type_ring');
    }
};
