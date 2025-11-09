<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TokoLaundry;

class TokoSeeder extends Seeder {
    public function run(): void {
        TokoLaundry::create([
            'nama_toko' => 'Kilat Laundry',
            'deskripsi' => 'Layanan cuci cepat, bersih, dan wangi di Bandar Lampung.',
            'gambar' => 'laundry1.jpg',
            'alamat' => 'Jl. Professor Sumantri Brojonegoro, Bandar Lampung',
            'no_hp' => '088706560821',
        ]);

        TokoLaundry::create([
            'nama_toko' => 'Express Wash',
            'deskripsi' => 'Paket laundry harian dan ekspres 3 jam jadi.',
            'gambar' => 'laundry2.jpg',
            'alamat' => 'Jl. ZA Pagar Alam No.45, Bandar Lampung',
            'no_hp' => '081234567890',
        ]);
    }
}
