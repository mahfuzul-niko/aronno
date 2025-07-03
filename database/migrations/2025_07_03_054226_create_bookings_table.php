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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('guest_name');
            $table->string('guest_number');
            $table->string('guest_email');
            $table->integer('price');

            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid');
            $table->enum('payment_type', ['cash', 'online'])->default('cash');
            $table->enum('booking_status', ['pending', 'arrived', 'cancelled'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
