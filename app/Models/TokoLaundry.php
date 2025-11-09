<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoLaundry extends Model {
    use HasFactory;

    protected $fillable = ['nama_toko', 'deskripsi', 'gambar', 'alamat', 'no_hp', 'slug'];

    public function layanans() {
        return $this->hasMany(Layanan::class, 'toko_id');
    }

    public function pesanans() {
        return $this->hasMany(Pesanan::class, 'toko_id');
    }
}
