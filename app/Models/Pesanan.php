<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'no_telepon',
        'alamat',
        'berat_kg',
        'tanggal_pesanan',
        'toko_id',
        'layanan_id',
        'total_harga',
        'status',
        'nama_layanan',
    ];


    public function tokoLaundry() {
        return $this->belongsTo(TokoLaundry::class, 'toko_id');
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
