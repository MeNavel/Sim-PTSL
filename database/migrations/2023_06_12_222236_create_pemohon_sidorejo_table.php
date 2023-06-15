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
        Schema::create('pemohon_sidorejo', function (Blueprint $table) {
            $table->foreignId('pemohon_id')->constrained('pemohon');
            $table->foreignId('sidorejo_id')->constrained('sidorejo');
            $table->primary(['pemohon_id', 'sidorejo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemohon_sidorejo');
    }
};
