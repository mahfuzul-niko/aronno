<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('image')->nullable();
            $table->string('name')->nullable();
            $table->string('slug');
            $table->string('view')->nullable();
            $table->integer('guest')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('area')->nullable();
            $table->integer('price');
            $table->integer('discount_price')->nullable();
            $table->integer('discount_percent')->nullable();
            $table->string('unit')->default('Per Night');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
