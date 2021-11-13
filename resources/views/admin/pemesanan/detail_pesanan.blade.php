<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <style>
        #pemesanan {
            transition: 0.5s all ease-in-out;
            /* opacity: 0; */
            height: 0px;
            border: none;
        }

        .lingkar {
            text-align: center;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .dots {
            width: 5px;
            height: 5px;
            margin: 5px 0;
            background: #fff;
            border-radius: 5px;
        }

        .status {
            text-align: center;
            font-size: 10px;
        }

        .konten {

            display: none;
        }


        .konten.active {
            display: flex;
            justify-content: center;
            margin: 0 auto;
        }

        #pemesanan.active {
            opacity: 1;
            background: purple;
            color: #fff;
            height: 100%;
            border-radius: 20px;
            padding: 20px 0;
            transition: 0.5s all ease-in-out;
        }
    </style>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset_img/baraka.jpeg') }}" alt="" height="50">
            </a>
        </div>

    </nav>
    <br><br>
    <div class="container" style="width: 100%">
        <h2 class="text-center">Detail Pesanan</h2>
        <div class="row">
            <div class="col-md-8">
                <br><br>
                <p>Nama : {{ $pemesanan->nama_pembeli }}</p>
                <p>{{ $pemesanan->nama_produk }}</p>
                <p>Total Barang : {{ $pemesanan->jumlah }}</p>
                <p>Status : {{ $pemesanan->status }} </p>
                <p>Tanggal Pemesanan : {{ $pemesanan->tanggal_pemesanan }}</p>
                <p>Lama Produksi : {{ $pemesanan->lama_produksi }}</p>
            </div>
            <div class="col-md-4"><img src="{{ asset('img/'.$pemesanan->gambar) }}" alt="" height="200px"></div>
        </div>
        <hr>
        <div class="check">
            <div class="col-md-6" style="margin: 0 auto;">
                <div class="card shadow">
                    <div class="btn btn-success" id="click">
                        Lihat Proses
                    </div>
                </div>
            </div>
        </div>
        <div id="pemesanan" class="card shadow pemesanan">
            <div class="konten col-md-10">
                <div class="row">
                    @if ($pemesanan->status=='Siap dikirim')


                    {{-- kirim --}}
                    <div class="status">
                        <img src=" {{ asset('asset_img/siap.png') }}" alt="" height="200px">100% Siap dikirim
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/packing.png') }}" alt="" width="200px"> 94% Pengemasan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/setirka.png') }}" alt="" height="200px">73% Sedang proses Setrika
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/olah.png') }}" alt="" height="200px">60% Pengolahan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/jait.png') }}" alt="" height="200px">45% Proses menjait
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>


                    {{-- pengemasan --}}



                    @elseif($pemesanan->status=='Barang sedang di packing')
                    <div class="status">
                        <img src="{{ asset('asset_img/packing.png') }}" alt="" width="200px"> 94% Pengemasan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/setirka.png') }}" alt="" height="200px">73% Sedang proses Setrika
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/olah.png') }}" alt="" height="200px">60% Pengolahan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/jait.png') }}" alt="" height="200px">45% Proses menjait
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>
                    {{-- setrika --}}

                    @elseif($pemesanan->status=='Pakaian sedang disetrika')
                    <div class="status">
                        <img src="{{ asset('asset_img/setirka.png') }}" alt="" height="200px">73% Sedang proses Setrika
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/olah.png') }}" alt="" height="200px">60% Pengolahan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/jait.png') }}" alt="" height="200px">45% Proses menjait
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>
                    {{-- pengolahan --}}
                    @elseif($pemesanan->status=='Sedang diolah')
                    <div class="status">
                        <img src="{{ asset('asset_img/olah.png') }}" alt="" height="200px">60% Pengolahan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/jait.png') }}" alt="" height="200px">45% Proses menjait
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>
                    {{-- menjait --}}
                    @elseif($pemesanan->status=='Dalam proses menjahit')
                    <div class="status">
                        <img src="{{ asset('asset_img/jait.png') }}" alt="" height="200px">45% Proses menjait
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>

                    {{-- potong bahan --}}
                    @elseif($pemesanan->status=='Proses pemotongan bahan')
                    <div class="status">
                        <img src="{{ asset('asset_img/potong.png') }}" alt="" height="200px">30% Pemotongan
                    </div>
                    <div class="lingkar">
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                        <div class="dot">
                            <div class="dots"></div>
                        </div>
                    </div>
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>

                    {{-- pemesana --}}
                    @else
                    <div class="status">
                        <img src="{{ asset('asset_img/order.png') }}" alt="" height="200px">15% Pemesanan
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $('#click').click(function(){
            $('#pemesanan').toggleClass("active")
            $('.konten').toggleClass("active")
        })
    </script>
</body>

</html>
