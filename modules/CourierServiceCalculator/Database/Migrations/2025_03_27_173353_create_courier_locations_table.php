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
        Schema::create('courier_locations', function (Blueprint $table) {
            $table->id();
            $table->string('customer_title', 15);
            $table->string('customer_forename', 25);
            $table->string('customer_surname', 25);
            $table->integer('building_number')->nullable();
            $table->string('street_address', 255);
            $table->string('city', 75);
            $table->string('postal_code', 9);
            $table->string('country', 2)->nullable(); // country_code
            $table->decimal('longitude', 9, 6);
            $table->decimal('latitude', 8, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_locations');
    }
};
