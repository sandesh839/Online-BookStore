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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('category')->nullable();
            $table->text('quantity')->nullable();
            $table->text('price')->nullable();
            $table->text('discount_price')->nullable();


            // ADD THESE 3 LINES HERE (Trending Algorithm Columns)
            $table->integer('view_count')->default(0);
            $table->integer('order_count')->default(0);
            $table->timestamp('last_ordered_at')->nullable();
            // END OF ADDITION




            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
