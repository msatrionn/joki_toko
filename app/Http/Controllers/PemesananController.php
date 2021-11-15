<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Pembeli;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Status_Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generate = random_int(1, 9999);
        $produk = Produk::all();
        $karyawan = Karyawan::all();
        $pembeli = Pembeli::all();
        $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
            ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
            ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
            ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->get();
        return view('admin.pemesanan.index', compact('generate', 'pemesanan', 'produk', 'karyawan', 'pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file = $request->file('gambar');
        $name = 'img' . $file->getClientOriginalName();
        $request->validate([
            'gambar' => 'mimes:png,jpg'
        ]);

        Pemesanan::create([
            'id_pemesanan' => $request->id_pemesanan,
            'produk_id' => $request->produk_id,
            'pembeli_id' => $request->pembeli_id,
            'karyawan_id' => $request->karyawan_id,
            'jumlah' => $request->jumlah,
            'gambar' => $name,
            'biaya' => $request->biaya,
            'ukuran' => $request->ukuran,
            'lama_produksi' => $request->lama_produksi,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'target_selesai' => $request->target_selesai,
        ]);
        Status_Pemesanan::create([
            'pemesanan_id' => $request->id_pemesanan,
            'status' => 'Memesan',
        ]);
        $file->move('img', $name);

        return redirect('admin/pemesanan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
            ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
            ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
            ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->where('id_pemesanan', $id)
            ->first();
        return view('admin.pemesanan.detail_pesanan', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::all();
        $karyawan = Karyawan::all();
        $pembeli = Pembeli::all();
        $pemesanan = Pemesanan::join('produk', 'produk.id_produk', 'pemesanan.produk_id')
            ->join('pembeli', 'pembeli.id_pembeli', 'pemesanan.pembeli_id')
            ->join('karyawan', 'karyawan.id_karyawan', 'pemesanan.karyawan_id')
            ->join('status_pemesanan', 'status_pemesanan.pemesanan_id', 'pemesanan.id_pemesanan')
            ->where('id_pemesanan', $id)
            ->first();
        return view('admin.pemesanan.edit', compact('pemesanan', 'produk', 'karyawan', 'pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pemesanans = Pemesanan::where('id_pemesanan', $id)->first();
        $pemesanan = Pemesanan::where('id_pemesanan', $id);
        $request->validate([
            'gambar' => 'mimes:png,jpg'
        ]);
        if ($request->file('gambar') == null) {
            $pemesanan->update([
                'id_pemesanan' => $request->id_pemesanan,
                'produk_id' => $request->produk_id,
                'pembeli_id' => $request->pembeli_id,
                'karyawan_id' => $request->karyawan_id,
                'jumlah' => $request->jumlah,
                'lama_produksi' => $request->lama_produksi,
                'produk_id' => $request->produk_id,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'target_selesai' => $request->target_selesai,
                'biaya' => $request->biaya,
                'ukuran' => $request->ukuran,
            ]);
        } else {
            $file = $request->file('gambar');
            $name = 'img' . $file->getClientOriginalName();
            File::delete('img/' . $pemesanans->gambar);
            $file->move('img', $name);
            $pemesanan->update([
                'id_pemesanan' => $request->id_pemesanan,
                'produk_id' => $request->produk_id,
                'pembeli_id' => $request->pembeli_id,
                'karyawan_id' => $request->karyawan_id,
                'jumlah' => $request->jumlah,
                'lama_produksi' => $request->lama_produksi,
                'produk_id' => $request->produk_id,
                'tanggal_pemesanan' => $request->tanggal_pemesanan,
                'target_selesai' => $request->target_selesai,
                'biaya' => $request->biaya,
                'ukuran' => $request->ukuran,
                'gambar' => $name,
            ]);
        }
        return redirect('admin/pemesanan');
    }
    public function update_pemesanan(Request $request, $id)
    {
        $pemesanan = Status_Pemesanan::where('pemesanan_id', $id)->first();
        $pemesanan->update([
            'status' => $request->status
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::where('id_pemesanan', $id);
        $pemesanans = Pemesanan::where('id_pemesanan', $id)->first();
        File::delete('img/' . $pemesanans->gambar);
        $pemesanan->delete();
        return back();
    }
}
