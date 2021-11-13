@extends('layouts_admin.home')
@section('title','Pelanggan')
@section('title_header','Pelanggan')
@section('content')

<form action="{{ route('pembeli.update',$pembeli->id_pembeli) }}" method="post">
    @csrf @method('put')
    <div class="form-group">
        <input type="hidden" name="id_pembeli" id="" value="{{ $pembeli->id_pembeli }}">
        <label for="user_id">User</label>
        <select name="user_id" id="user_id" class="form-control">
            @foreach ($user as $item)
            <option value="{{ $item->id }}">{{ $item->username }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nama_pembeli">Nama pembeli</label>
        <input id="nama_pembeli" class="form-control" type="text" name="nama_pembeli"
            value="{{ $pembeli->nama_pembeli }}">
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input id="alamat" class="form-control" type="text" name="alamat" value="{{ $pembeli->alamat }}">
    </div>
    <div class="form-group">
        <label for="no_hp">No Hp</label>
        <input id="no_hp" class="form-control" type="text" name="no_hp" value="{{ $pembeli->no_hp }}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
@endsection
