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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->integer('person_quantity');
            $table->string('room_type');
            $table->dateTime('start_date_time');
            $table->dateTime('end_date_time');
            $table->integer('total_play_time');
            $table->integer('total_payment_amount');
            $table->integer('status_change_chance')->default(1);
            $table->enum('status',['pending','accepted','refused'])->default('pending');
            $table->string('comment')->nullable();

            $table->timestamps();

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
