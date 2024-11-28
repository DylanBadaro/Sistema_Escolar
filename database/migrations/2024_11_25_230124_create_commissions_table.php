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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->string('classroom'); // Aula
            $table->string('schedule'); // Horario (8-12, 12-16, etc.)
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); // Relación con Course
            $table->timestamps();

            // Eliminar la restricción de índice único
            // $table->unique(['schedule', 'course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commissions');
    }
};