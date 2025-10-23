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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // 🧾 Customer Info
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who reserved
            $table->string('name');          // customer name
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // 🍽️ Reservation Details
            $table->unsignedBigInteger('food_id')->nullable(); // food linked to reservation
            $table->string('table_number')->nullable();
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->integer('guests')->default(1);

            // 🧾 Status & Notes
            $table->string('status')->default('Pending'); // Pending, Confirmed, Cancelled
            $table->text('notes')->nullable();

            $table->timestamps();

            // Foreign key (optional if you have a foods table)
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
