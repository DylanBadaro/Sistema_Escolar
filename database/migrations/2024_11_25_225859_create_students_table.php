<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('name'); // Nombre del estudiante
            $table->string('email')->unique(); // Email único
            $table->foreignId('course_id')->constrained(); // Relación con la tabla 'courses'
            $table->timestamps(); // Timestamps (created_at y updated_at)
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
