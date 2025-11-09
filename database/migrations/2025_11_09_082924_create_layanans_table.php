<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toko_id')->constrained('toko_laundries')->onDelete('cascade');
            $table->string('nama_layanan');
            $table->decimal('harga_per_kg', 10, 2);
            $table->integer('estimasi_hari')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
