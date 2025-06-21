<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kabkota', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->foreignId('provinsi_id')->constrained('provinsi')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kabkota');
    }
};