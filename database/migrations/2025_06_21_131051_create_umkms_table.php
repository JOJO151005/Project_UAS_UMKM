<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkm', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('modal')->nullable();
            $table->string('pemilik', 45)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->string('website', 45)->nullable();
            $table->string('email', 45)->nullable();
            $table->integer('rating')->nullable();
            $table->foreignId('kabkota_id')->constrained('kabkota')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('kategori_umkm_id')->constrained('kategori_umkm')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('pembina_id')->nullable()->constrained('pembina')->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};