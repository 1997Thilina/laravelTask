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
        Schema::create('define_frees', function (Blueprint $table) {
            $table->id();
            $table->string('free_label');
            $table->string('type');
            $table->string('product');
            $table->string('sku_id');
            $table->string('unit_price');
            //$table->string('free_product');
            $table->string('purchase_quantity');
            $table->string('free_quantity');
            $table->string('lower_limit');
            $table->string('upper_limit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('define_frees');
    }
};
