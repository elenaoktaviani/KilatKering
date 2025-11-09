<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model {
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'harga_per_kg',
        'estimasi_hari',
        'toko_id'
    ];

    public function tokoLaundry() {
        return $this->belongsTo(TokoLaundry::class, 'toko_id');
    }

    public function pesanans() {
        return $this->hasMany(Pesanan::class, 'layanan_id');
    }
}
