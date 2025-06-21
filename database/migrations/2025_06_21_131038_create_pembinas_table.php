<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembina', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->char('gender', 1)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tmp_lahir', 30)->nullable();
            $table->string('keahlian', 200)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembina');
    }
};