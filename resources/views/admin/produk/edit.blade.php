@extends('layouts_admin.home')
@section('title','Produk')
@section('title_header','Produk')
@section('content')

<form action="{{ route('produk.update',$produk->id_produk) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <label for="nama_produk">Nama produk</label>
        <input id="nama_produk" class="form-control" type="text" name="nama_produk" value="{{ $produk->nama_produk }}"
            required>
    </div>
    <div class="form-group">
        <label for="jenis_produk">Text</label>
        <input id="jenis_produk" class="form-control" type="text" name="jenis_produk"
            value="{{ $produk->jenis_produk }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
