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
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->string('title');
            $table->foreignId('category_id')
            ->nullable()
            ->constrained('categories')
            ->onDelete('set null');
            $table->foreignId('brand_id')
            ->nullable()
            ->constrained('brands')
            ->onDelete('set null');
            $table->foreignId('type_id')
            ->nullable()
            ->constrained('types')
            ->onDelete('set null');
            $table->foreignId('status_id')
            ->nullable()
            ->constrained('statuses')
            ->onDelete('set null');
            $table->string('year');
            $table->text('description');
            $table->string('price');
            $table->string('location');
            $table->string('product_photo');
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
