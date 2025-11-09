<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('toko_laundries', function (Blueprint $table) {
            $table->id();
            $table->string('nama_toko');
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable();
            $table->string('alamat');
            $table->string('no_hp', 20);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('toko_laundries');
    }
};
