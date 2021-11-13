@extends('layouts_admin.home')
@section('title','Pemesanan')
@section('title_header','Pemesanan')
@section('content')


<br>
<style>
    a.arrow i:hover {
        color: skyblue;
    }
</style>
<div class="table-responsive">
    <button class="btn btn-primary btn-sm col-md-3" type="button" data-toggle="modal" data-target="#my-modalAdd">Tambah
        Pemesanan</button>
    <div class="form-group" style="margin-right: 0 auto; float: right;width: 300px">
        <label for="">Search</label>
        <input type="text" name="" id="myCustomSearchBox">
    </div>
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
                <td>Aksi</td>
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
                <td>
                    <form action="{{ route('update_pemesanan',$item->id_pemesanan) }}" method="post" id="form">
                        @csrf @method('put')
                        <div class="row" style="display: flex; width: 100%;align-items: center">
                            <select name="status" id="" class="form-control"
                                style="border:1px solid rgba(0,0,0,0.1);width:90%;" onchange="submitDialog()">
                                <option value="{{ $item->status}}" class="btn-primary">{{ $item->status}}</option>
                                <option value="Memesan">Memesan</option>
                                <option value="Proses pemotongan bahan">Pemotongan Bahan</option>
                                <option value="Dalam proses menjahit">Proses Penjahitan</option>
                                <option value="Sedang diolah">Pengolahan Basah</option>
                                <option value="Pakaian sedang disetrika">Setrika Pakaian</option>
                                <option value="Barang sedang di packing">Packing</option>
                                <option value="Siap dikirim">Siap dikirim</option>
                            </select>
                            <div style="width: 3%;margin-left: 5px">
                                <a href="{{ route('pemesanan.show',$item->id_pemesanan) }}"><i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </form>
                </td>
                <td>{{ $item->biaya }}</td>
                <td>{{ $item->ukuran }}</td>
                <td>{{ $item->jumlah }}</td>
                <td><img src="{{ asset('img/'.$item->gambar) }}" alt="" height="150px"></td>
                <td>
                    <form action="{{ route('pemesanan.destroy',$item->id_pemesanan) }}" method="post">
                        @csrf @method('delete')
                        <a href="{{ route('pemesanan.edit',$item->id_pemesanan) }}" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Anda ingin Menghapus?');">hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




{{-- modal add --}}

<div id="my-modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Tambah Pemesanan</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pemesanan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id_pemesanan" id="" value="{{ $generate }}">
                        <label for="">Produk</label>
                        <select name="produk_id" class="form-control input-class" id="" aria-describedby="helpId"
                            required>
                            @foreach ($produk as $item)
                            <option value="{{ $item->id_produk }}">{{ $item->nama_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama pembeli</label>
                        <select name="pembeli_id" class="form-control input-class" id="" aria-describedby="helpId"
                            required>
                            @foreach ($pembeli as $item)
                            <option value="{{ $item->id_pembeli }}">{{ $item->nama_pembeli }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama karyawan</label>
                        <select name="karyawan_id" class="form-control input-class" id="" aria-describedby="helpId"
                            required>
                            @foreach ($karyawan as $item)
                            <option value="{{ $item->id_karyawan }}">{{ $item->nama_karyawan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Jumlah</label>
                        <input type="numbar" class="form-control input-class" name="jumlah" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">lama Produksi</label>
                        <input type="text" class="form-control input-class" name="lama_produksi" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal pesan</label>
                        <input type="date" class="form-control input-class" name="tanggal_pemesanan" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Target jadi</label>
                        <input type="date" class="form-control input-class" name="target_selesai" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Biaya</label>
                        <input type="number" class="form-control input-class" name="biaya" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Ukuran</label>
                        <input type="text" class="form-control input-class" name="ukuran" id=""
                            aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" class="form-control input-class @error('gambar') is-invalid @enderror"
                            name="gambar" id="" aria-describedby="helpId" placeholder="" required>
                    </div>

                    @error('gambar')
                    <script>
                        alert('Gagal menambah data, tipe file harus png atau jpg')
                    </script>
                    @enderror
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modal --}}




</div>
<script>
    function submitDialog(){
        pop= confirm("Ganti status?");
        if (pop) {
            this.form.submit()
        }
        else{
            location.reload()
        }
    }
</script>
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
