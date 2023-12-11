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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('cinema_id');
            $table->integer('room_id');
            $table->integer('event_id');
            $table->integer('seat_id')->nullable();
            $table->dateTime('order_date')->nullable();
            $table->string('person_session')->nullable();
            $table->string('person_name')->nullable();
            $table->string('person_email')->nullable();
            $table->enum('order_status', ['free', 'tmp_reserved', 'sold'] )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
