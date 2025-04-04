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
        Schema::create('courier_delivery_destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_job_id');
            $table->integer('location_id');
            $table->float('distance_from_pickup');
            $table->integer('delivery_order'); // order from 1 -> 5
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_delivery_destinations');
    }
};
