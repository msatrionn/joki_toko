@extends('layouts_admin.home')
@section('title','Karyawan')
@section('title_header','Karyawan')
@section('content')

<form action="{{ route('karyawan.update',$karyawan->id_karyawan) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" class="form-select">
            @foreach ($user as $item)
            <option value="{{ $item->id }}">{{ $item->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_karyawan">Nama karyawan</label>
        <input id="nama_karyawan" class="form-control" type="text" name="nama_karyawan"
            value="{{ $karyawan->nama_karyawan }}">
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input id="jabatan" class="form-control" type="text" name="jabatan" value="{{ $karyawan->jabatan }}">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input id="alamat" class="form-control" type="text" name="alamat" value="{{ $karyawan->alamat }}">
    </div>
    <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input id="no_hp" class="form-control" type="text" name="no_hp" value="{{ $karyawan->no_hp }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
