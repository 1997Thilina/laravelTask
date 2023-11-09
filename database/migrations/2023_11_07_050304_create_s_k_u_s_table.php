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
        Schema::create('s_k_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('sku_name');
            $table->string('mrp');
            $table->string('dPrice');
            $table->string('quantity');
            $table->string('wov');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_k_u_s');
    }
};
