<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder {
    public function run(): void {
        Layanan::create([
            'nama_layanan' => 'Cuci Kering',
            'harga_per_kg' => 8000,
            'estimasi_hari' => 2,
            'toko_id' => 1
        ]);

        Layanan::create([
            'nama_layanan' => 'Setrika Saja',
            'harga_per_kg' => 5000,
            'estimasi_hari' => 1,
            'toko_id' => 1
        ]);
    }
}
