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
    Schema::table('commissions', function (Blueprint $table) {
        $table->unique(['schedule', 'course_id']); // Esto crea la restricción UNIQUE
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // En caso de revertir, agregar nuevamente el índice único
        Schema::table('commissions', function (Blueprint $table) {
            $table->unique(['schedule', 'course_id']);
        });
    }
};