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
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignUuId('student_id')->constrained()->onDelete('cascade');
            $table->foreignUuId('course_id')->constrained()->onDelete('cascade');
            // kolom tambahan 
            $table->string('status')->default('pending');
            $table->timestamps();
            // unique biar tidak ada data duplikat
            $table->unique(['student_id', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
