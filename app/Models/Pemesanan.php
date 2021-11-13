<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'id_pemesanan', 'produk_id', 'pembeli_id', 'karyawan_id', 'jumlah',
        'lama_produksi', 'tanggal_pemesanan', 'target_selesai', 'biaya', 'ukuran', 'gambar'
    ];
}
