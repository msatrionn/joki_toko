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
    <form action="{{ route('pemesanan.laporan') }}" method="get">
        <div class="row col-md-6">
            <div class="form-group col-md-3">
                <label for="">awal</label>
                <input type="date" name="awal" class="form-control " value="{{ $awal }}"
                    style="border: 1px solid rgba(0,0,0,0.1)">
            </div>
            <div class="form-group col-md-3">
                <label for="">akhir</label>
                <input type="date" name="akhir" class="form-control" value="{{ $akhir }}"
                    style="border: 1px solid rgba(0,0,0,0.1)">
            </div>
            <div class="form-group col-md-3">
                <br>
                <button type="submit" class="btn btn-success mt-2">Filter</button>
            </div>
        </div>
    </form>
    <div class="form-group" style="margin-right: 0 auto; float: right;width: 300px">
        <label for="">Search</label>
        <input type="text" name="" id="myCustomSearchBox">
    </div>
    <table class="table" id="tabel-info" width="100%">
        <thead>
            <tr class="btn-primary">
                <td>No</td>
                <td>Tanggal Pemesanan</td>
                <td>Total</td>
                <td>jumlah</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemesanan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->tanggal_pemesanan}}</td>
                <td>Rp. {{ number_format($item->biaya,0,2) }}</td>
                <td>{{ $item->jumlah }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>






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
