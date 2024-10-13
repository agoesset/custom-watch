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
        Schema::create('custom_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->enum('part', ['Cases', 'Dials', 'Crown', 'Bezel', 'Ring', 'Hand', 'Second Hand', 'Rubber']);
            $table->string('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_products');
    }
};
