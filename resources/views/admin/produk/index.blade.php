@extends('layouts_admin.home')
@section('title','Produk')
@section('title_header','Produk')
@section('content')


<br>
<div class="table-responsive">
    <button class="btn btn-primary btn-sm col-md-1" type="button" data-toggle="modal" data-target="#my-modalAdd">Tambah
        Produk</button>
    <div class="form-group" style="margin-right: 0 auto; float: right;width: 300px">
        <label for="">Search</label>
        <input type="text" name="" id="myCustomSearchBox">
    </div>
    <table class="table" id="tabel-info" width="100%">
        <thead>
            <tr class="btn-primary">
                <td>No</td>
                <td>Nama Produk</td>
                <td>Jenis Produk</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($produk as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->jenis_produk }}</td>
                <td>
                    <form action="{{ route('produk.destroy',$item->id_produk) }}" method="post">
                        @csrf @method('delete')
                        <a href="{{ route('produk.edit',$item->id_produk) }}" class="btn btn-warning">Edit</a>
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
                    <h5 class="modal-title" id="my-modal-title">Tambah Produk</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('produk.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control input-class" name="nama_produk" id=""
                                aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Produk</label>
                            <input type="text" class="form-control input-class" name="jenis_produk" id=""
                                aria-describedby="helpId" placeholder="">
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
