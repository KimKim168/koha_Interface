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
        Schema::create('submissions', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('full_name'); // Full name field
            $table->enum('gender', ['male', 'female', 'na']); // Gender field
            $table->string('phone_number'); // Phone number field
            $table->enum('location', ['Sen Sok', 'Chroy Chongvar', 'Not Decided Yet']); // Preferred location field
            $table->timestamps(); // Created at, updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};