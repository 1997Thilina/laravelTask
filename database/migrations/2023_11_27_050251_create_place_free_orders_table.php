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
        Schema::create('place_free_orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('bulk_id');
            $table->string('product_name');
            $table->string('product_code');
            //$table->string('free_product');
            $table->string('price');
            $table->string('en_qty');
            $table->string('free_qty')->nullable();
            $table->string('discount')->nullable();
            $table->string('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_free_orders');
    }
};
