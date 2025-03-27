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
        Schema::create('courier_drivers', function (Blueprint $table) {
            $table->id();
            /**
             * 'title',
             * 'forename',
             * 'surname',
             * 'dob',
             * 'email',
             * 'phone_number',
             * 'passcode',
             */
            $table->string('title', 15);
            $table->string('forename', 25);
            $table->string('surname', 25);
            $table->date('dob');
            $table->string('email', 150);
            $table->string('phone_number', 14);
            $table->string('passcode', 6)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_drivers');
    }
};
