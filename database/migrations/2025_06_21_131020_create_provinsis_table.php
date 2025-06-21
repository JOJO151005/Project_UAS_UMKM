<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 45);
            $table->string('ibukota', 45)->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            // Laravel secara otomatis menambahkan created_at dan updated_at
            // Jika tidak ingin, tambahkan $table->timestamps(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('provinsi');
    }
};