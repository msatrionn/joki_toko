@extends('layouts_admin.home')
@section('title','Dashboard')
@section('title_header','Dashboard')
@section('content')
<style>
    .keterangan {
        border-radius: 20px;
        text-align: center;
        background: #6f42c1;
        color: #fff
    }
</style>
<div class="container">
    <div class="row" style="display: flex; justify-content: center">
        <div class="keterangan card shadow col-md-2 py-3 mt-3" style="margin:  0 10px;">
            <span>Jumlah
                Pelanggan : {{ $jumlah_pembeli }}</span>
        </div>
        <div class="keterangan card shadow col-md-2 py-3 mt-3" style="margin:  0 10px;"><span>Total Pesanan
                : {{ $jumlah_pesanan }}</span>
        </div>
        <div class="keterangan card shadow col-md-2 py-3 mt-3" style="margin:  0 10px;"><span>Belum
                Selesai : {{ $belum }}</span></div>
        <div class="keterangan card shadow col-md-2 py-3 mt-3" style="margin:  0 10px;"><span>Sudah
                Selesai : {{ $sudah }}</span></div>
    </div>
</div>
<br><br>
<div class="table-responsive">
    <table class="table" id="tabel-info" width="100%">
        <thead>
            <tr class="btn-primary">
                <td>No</td>
                <td>Nama Produk</td>
                <td>Nama Pembeli </td>
                <td>Lama Produksi</td>
                <td>Tanggal Pesan</td>
                <td>Target Selesai</td>
                <td>Status Pemesanan</td>
                <td>Biaya</td>
                <td>Ukuran</td>
                <td>jumlah</td>
                <td>Gambar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_produk}}</td>
                <td>{{ $item->nama_pembeli }}</td>
                <td>{{ $item->lama_produksi}}</td>
                <td>{{ $item->tanggal_pemesanan}}</td>
                <td>{{ $item->target_selesai }}</td>
                <td>{{ $item->status }} </td>
                <td>{{ $item->biaya }}</td>
                <td>{{ $item->ukuran }}</td>
                <td>{{ $item->jumlah }}</td>
                <td><img src="{{ asset('img/'.$item->gambar) }}" alt="" height="150px"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
