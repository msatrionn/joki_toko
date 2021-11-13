@extends('layouts_admin.home')
@section('title','Produk')
@section('title_header','Produk')
@section('content')

<form action="{{ route('pemesanan.update',$pemesanan->id_pemesanan) }}" method="post" enctype="multipart/form-data">
    @csrf @method('put')
    <div class="form-group">
        <input type="hidden" value="{{ $pemesanan->id_pemesanan }}" name="id_pemesanan" id="">
        <label for="">Produk</label>
        <select name="produk_id" class="form-control input-class" id="" aria-describedby="helpId">
            @foreach ($produk as $item)
            <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Nama pembeli</label>
        <select name="pembeli_id" class="form-control input-class" id="" aria-describedby="helpId">
            @foreach ($pembeli as $item)
            <option value="{{ $item->id_pembeli }}">{{ $item->nama_pembeli }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Nama karyawan</label>
        <select name="karyawan_id" class="form-control input-class" id="" aria-describedby="helpId">
            @foreach ($karyawan as $item)
            <option value="{{ $item->id_karyawan }}">{{ $item->nama_karyawan }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Jumlah</label>
        <input type="numbar" class="form-control input-class" name="jumlah" id="" aria-describedby="helpId"
            placeholder="" value="{{ $pemesanan->jumlah }}" required>
    </div>
    <div class="form-group">
        <label for="">lama Produksi</label>
        <input type="text" class="form-control input-class" name="lama_produksi" id="" aria-describedby="helpId"
            placeholder="" value="{{ $pemesanan->lama_produksi }}" required>
    </div>
    <div class="form-group">
        <label for="">Tanggal pesan</label>
        <input type="date" class="form-control input-class" name="tanggal_pemesanan" id="" aria-describedby="helpId"
            placeholder="" value="{{ $pemesanan->tanggal_pemesanan }}" required>
    </div>
    <div class="form-group">
        <label for="">Target jadi</label>
        <input type="date" class="form-control input-class" name="target_selesai" id="" aria-describedby="helpId"
            placeholder="" value="{{ $pemesanan->target_selesai }}" required>
    </div>
    <div class="form-group">
        <label for="">Biaya</label>
        <input type="number" class="form-control input-class" name="biaya" id="" aria-describedby="helpId"
            placeholder="" value="{{ $pemesanan->biaya }}" required>
    </div>
    <div class="form-group">
        <label for="">Ukuran</label>
        <input type="text" value="{{ $pemesanan->ukuran }}" class="form-control input-class" name="ukuran" id=""
            aria-describedby="helpId" placeholder="" required>
    </div>
    <div class="form-group">
        <label for="">Gambar</label>
        <img src="{{ asset('img/'.$pemesanan->gambar) }}" alt="" height="200px">
        <input type="file" class="form-control input-class @error('gambar') is-invalid @enderror" name="gambar" id=""
            aria-describedby="helpId" placeholder="">
    </div>
    @error('gambar')
    <script>
        alert('Gagal menambah data, tipe file harus png atau jpg')
    </script>
    @enderror

    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
