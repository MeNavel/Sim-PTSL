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
        Schema::create('penerima_sidorejo', function (Blueprint $table) {
            $table->foreignId('penerima_id')->constrained('penerima');
            $table->foreignId('sidorejo_id')->constrained('sidorejo');
            $table->primary(['penerima_id', 'sidorejo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penerima_sidorejo');
    }
};
