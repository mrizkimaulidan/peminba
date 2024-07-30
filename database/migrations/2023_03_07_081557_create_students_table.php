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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_study_id')->constrained();
            $table->foreignId('school_class_id')->constrained();
            $table->string('identification_number', 12)->unique();
            $table->string('name', 30);
            $table->string('email', 30)->unique();
            $table->string('password', 100);
            $table->string('phone_number', 12)->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
