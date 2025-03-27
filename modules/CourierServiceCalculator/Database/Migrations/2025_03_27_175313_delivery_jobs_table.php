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
        Schema::create('courier_delivery_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->integer('assistant_driver_id');
            $table->integer('pickup_location_id');
            $table->float('total_distance');
            $table->boolean('requires_two_drivers')->default(false);
            $table->dateTime('job_date');
            $table->integer('total_cost')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_delivery_jobs');
    }
};
