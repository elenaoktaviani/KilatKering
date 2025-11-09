<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PesananSeeder extends Seeder {
    public function run() {
        DB::table('pesanans')->insert([
            [
                'toko_id' => 1,
                'layanan_id' => 1,
                'nama_pelanggan' => 'Bram Simbolon',
                'alamat' => 'Jl. Rajabasa No. 10, Bandar Lampung',
                'no_telepon' => '081234567890',
                'tanggal_pesanan' => Carbon::now()->toDateString(),
                'total_harga' => 16000,
                'status' => 'proses',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'toko_id' => 1,
                'layanan_id' => 2,
                'nama_pelanggan' => 'Ahmad Sutanto',
                'alamat' => 'Jl. Soekarno-Hatta No. 22',
                'no_telepon' => '082345678912',
                'tanggal_pesanan' => Carbon::now()->toDateString(),
                'total_harga' => 20000,
                'status' => 'selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
