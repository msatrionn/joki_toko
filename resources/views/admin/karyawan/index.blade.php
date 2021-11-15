@extends('layouts_admin.home')
@section('title','karyawan')
@section('title_header','karyawan')
@section('content')


<br>
<div class="table-responsive">
    <button class="btn btn-primary btn-sm col-md-3" type="button" data-toggle="modal" data-target="#my-modalAdd">Tambah
        Karyawan</button>
    <div class="form-group" style="margin-right: 0 auto; float: right;width: 300px">
        <label for="">Search</label>
        <input type="text" name="" id="myCustomSearchBox">
    </div>
    <table class="table" id="tabel-info" width="100%">
        <thead>
            <tr class="btn-primary">
                <td>No</td>
                <td>Nama karyawan</td>
                <td>Username </td>
                <td>Jabatan</td>
                <td>Alamat</td>
                <td>No HP</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_karyawan }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->alamat}}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    <form action="{{ route('karyawan.destroy',$item->id_karyawan) }}" method="post">
                        @csrf @method('delete')
                        <a href="{{ route('karyawan.edit',$item->id_karyawan) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Anda ingin Menghapus?');">hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




    {{-- modal add --}}

    <div id="my-modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="my-modal-title">Tambah karyawan</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('karyawan.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama karyawan</label>
                            <input type="text" class="form-control input-class" name="nama_karyawan" id=""
                                value="{{ old('nama_karyawan') }}" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control input-class @error('username') is-invalid @enderror"
                                name="username" id="" value="{{ old('username') }}" aria-describedby="helpId"
                                placeholder="" required>
                        </div>
                        @error('username')
                        <span class="alert-danger"> {{ $message }}</span>
                        <script>
                            alert('user sudah ada')
                        </script>
                        @enderror
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control input-class" name="password" id=""
                                value="{{ old('password') }}" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control input-class" name="jabatan" id=""
                                value="{{ old('jabatan') }}" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control input-class" name="alamat" id=""
                                value="{{ old('alamat') }}" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">No HP</label>
                            <input type="text" class="form-control input-class" name="no_hp" id=""
                                value="{{ old('no_hp') }}" aria-describedby="helpId" placeholder="" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- modal --}}




</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    var dTable=$('#tabel-info').DataTable({
                "dom": "rtip",
            });

            $('#myCustomSearchBox').keyup(function(){
            dTable.search($(this).val()).draw(); // this is for customized searchbox with datatable search feature.
            })
</script>
@endsection
