<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toko_id')
                ->constrained('toko_laundries') 
                ->onDelete('cascade');
            $table->foreignId('layanan_id')
                ->constrained('layanans')
                ->onDelete('cascade');
            $table->string('nama_pelanggan');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->date('tanggal_pesanan');
            $table->decimal('total_harga', 10, 2);
            $table->string('status');
            $table->timestamps();
        });
    }



    public function down(): void {
        Schema::dropIfExists('pesanans');
    }
};
