@extends('layouts_admin.home')
@section('title','Karyawan')
@section('title_header','Karyawan')
@section('content')

<form action="{{ route('karyawan.update',$karyawan->id_karyawan) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <div class="form-group">
            <input type="hidden" name="id_karyawan" id="" value="{{ $karyawan->id_karyawan }}">
            <label for="nama_karyawan">Username karyawan</label>
            <input id="username" class="form-control" type="text" name="username" value="{{ $karyawan->username }}"
                required>
        </div>
    </div>
    <div class="form-group">
        <label for="nama_karyawan">Nama karyawan</label>
        <input id="nama_karyawan" class="form-control" type="text" name="nama_karyawan"
            value="{{ $karyawan->nama_karyawan }}" required>
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input id="jabatan" class="form-control" type="text" name="jabatan" value="{{ $karyawan->jabatan }}" required>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input id="alamat" class="form-control" type="text" name="alamat" value="{{ $karyawan->alamat }}" required>
    </div>
    <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input id="no_hp" class="form-control" type="text" name="no_hp" value="{{ $karyawan->no_hp }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
