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
        Schema::create('courier_courier_services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name', 25);
            $table->string('service_description', 255);
            $table->string('service_frontend_label', 25);
            $table->integer('standard_rate');
            $table->integer('cost_per_mile');
            $table->integer('second_person_cost');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_courier_services');
    }
};
