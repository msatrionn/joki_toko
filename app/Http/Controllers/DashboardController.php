<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
            ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
            ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
            ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->get();
        $jumlah_pembeli = Pembeli::count('id_pembeli');
        $jumlah_pesanan = Pemesanan::count('id_pemesanan');
        $belum = Pemesanan::join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->where('status', '!=', 'Siap dikirim')->count('id_pemesanan');
        $sudah = Pemesanan::join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->where('status', 'Siap dikirim')->count('id_pemesanan');
        return view('admin.index', compact(
            'jumlah_pembeli',
            'jumlah_pesanan',
            'belum',
            'sudah',
            'pemesanan'
        ));
    }
    public function home()
    {
        if (auth()->user()) {
            if (auth()->user()->level == 'admin' or auth()->user()->level == 'karyawan') {
                $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
                    ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
                    ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
                    ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
                    ->orderBy('id_pemesanan')
                    ->take(5)
                    ->get();
            } else {
                $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
                    ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
                    ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
                    ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
                    ->where('pembeli.user_id', auth()->user()->id)
                    ->get();
            }
            return view('client', compact('pemesanan'));
        }
        return view('client');
    }
}
