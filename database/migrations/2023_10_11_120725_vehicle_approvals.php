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
        Schema::create('vehicle_approvals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_booking_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('vehicle_booking_id')->constrained('vehicle_bookings');
            $table->foreign('user_id')->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_approvals');
    }
};
