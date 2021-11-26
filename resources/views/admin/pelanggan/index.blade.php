@extends('layouts_admin.home')
@section('title','pembeli')
@section('title_header','pembeli')
@section('content')


<br>
<div class="table-responsive">
    <button class="btn btn-primary btn-sm col-md-3" type="button" data-toggle="modal" data-target="#my-modalAdd">Tambah
        Pembeli</button>
    <div class="form-group" style="margin-right: 0 auto; float: right;width: 300px">
        <label for="">Search</label>
        <input type="text" name="" id="myCustomSearchBox">
    </div>
    <table class="table" id="tabel-info" width="100%">
        <thead>
            <tr class="btn-primary">
                <td>No</td>
                <td>Username</td>
                <td>Nama Pembeli</td>
                <td>Alamat </td>
                <td>No hp</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembeli as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nama_pembeli }}</td>
                <td>{{ $item->alamat}}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    <form action="{{ route('pembeli.destroy',$item->id_pembeli) }}" method="post">
                        @csrf @method('delete')
                        <a href="{{ route('pembeli.edit',$item->id_pembeli) }}" class="btn btn-warning">Edit</a>
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
                    <h5 class="modal-title" id="my-modal-title">Tambah pembeli</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pembeli.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama pembeli</label>
                            <input type="text" class="form-control input-class" name="nama_pembeli" id=""
                                aria-describedby="helpId" placeholder="" value="{{ old('nama_pembeli') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control input-class @error('username') is-invalid @enderror"
                                name="username" id="" aria-describedby="helpId" value="{{ old('username') }}"
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
                                aria-describedby="helpId" placeholder="" value="{{ old('password') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" class="form-control input-class" name="alamat" id=""
                                aria-describedby="helpId" placeholder="" value="{{ old('alamat') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="">No HP</label>
                            <input type="text" class="form-control input-class" name="no_hp" id=""
                                aria-describedby="helpId" placeholder="" value="{{ old('no_hp') }}" required>
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
