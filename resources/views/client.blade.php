<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
        integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <style>
        @keyframes my-animation {
            from {
                opacity: 0;
                left: -500px;
            }

            to {
                opacity: 1;
                left: 0;
            }
        }

        .run-animation {
            position: relative;
            animation: my-animation 2s ease;
        }

        #logo {
            z-index: 99;
            color: aliceblue;
            text-align: center;
            font-family: Palatino Linotype, Book Antiqua, Palatino, serif;
        }
    </style>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset_img/baraka.jpeg') }}" alt="" height="50">
            </a>
        </div>
    </nav>
    <section class="head">
        <img src="{{ asset('asset_img/rak.jpg') }}" alt="" width="100%" height="500px" style="object-fit: cover">
        <div class="cover" style="width: 100%;height: 500px;background:rgba(0,0,0,0.2);position: absolute;top: 74px">
        </div>
        <div class="text" style="position: absolute;top: 200px;display: flex;width: 100%;justify-content: center;">
            <h1 id="logo" class="run-animation">
                <span> Selamat Datang di BARAKA</span>
                <br>Tempatnya pembuatan gamis berkualitas
            </h1>
        </div>
    </section>
    <br><br>
    <section class="head">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 card shadow" style="border-radius: 10px">
                    <div class="content" style="padding: 20px;display: flex;">
                        <i class="fas fa-user-lock" style="font-size: 50px;color: coral;width:75px"></i>
                        <h5 style="width:150px;line-height: 60px;margin-left: 5px;"> 100% aman</h5>
                    </div>
                </div>
                <div class="col-md-4 card shadow" style="border-radius: 10px">
                    <div class="content" style="padding: 20px;display: flex;">
                        <i class="fas fa-check" style="font-size: 50px;color: coral"></i>
                        <h5 style="width:150px;line-height: 60px;margin-left: 5px;">Berkualitas</h5>
                    </div>
                </div>
                <div class="col-md-4 card shadow" style="border-radius: 10px">
                    <div class="content" style="padding: 20px;display: flex;">
                        <i class="fas fa-truck" style="font-size: 50px;color: coral"></i>
                        <h5 style="width:150px;line-height: 60px;margin-left: 5px;">Bisa kirim</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <section class="konten">
        <div class="container">
            <div class="inner-content">
                <h1 style="text-align: center">Pesanan anda</h1>
                <br>
                <br>
                @if (auth()->user())
                <div class="row" style="text-align: center;justify-content: center">
                    @foreach ($pemesanan as $item)
                    <div class="isi col-md-4 mt-2" style="display: flex;justify-content: center">
                        <div class="card shadow" style="width: 18rem;">
                            <img src="{{ asset('img/'.$item->gambar) }}" class="card-img-top" height="300px"
                                style="object-fit: cover" alt="gambar">
                            <div class="card-body">
                                <h5 class="card-title">{{$item->nama_produk}}</h5>
                                <p class="card-text">
                                    Pesan : {{ $item->tanggal_pemesanan }} <br>
                                    Target : {{ $item->target_selesai }} <br>
                                    Total Biaya : {{ $item->biaya }}
                                <h5 class="alert-info">Status: {{ $item->status }} </h5>
                                </p>
                                <a href="{{ route('pemesanan',$item->id_pemesanan) }}" class="btn btn-primary">Lihat
                                    Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <h2>Belum ada pesanan</h2>
                @endif
            </div>
        </div>
    </section>
    <br><br>
    <section class="footer">
        <div class="foot" style="background: coral;height: 300px;">
            <div class="sosmed">
                <div class="warp" style="text-align: center;color: aliceblue;padding-top: 30px;">
                    <h5>Kontak</h5>
                    <a href="" style="color: aliceblue; text-decoration: none;margin: 0 10px; ;font-size: 50px;"><i
                            class="fab fa-instagram"></i></a>
                    <a href="" style="color: aliceblue; text-decoration: none;margin: 0 10px; ;font-size: 50px;"><i
                            class="fab fa-whatsapp"></i></a>

                    <p>Alamat</p>
                    <span>Jl.Honggowicono Link. Ngabean RT.3
                        <br> <span>RW.3 Kel. Pringapus Kab.Semarang</span>
                    </span>
                </div>
            </div>
            <div style="padding-top: 48px;color:white;z-index: 999;">
                copyright@2021</div>
        </div>
    </section>
    <script>
        // This changes everything
    "use strict";

    // retrieve the element
    var element = document.getElementById("logo");

    // reset the transition by...
    element.addEventListener("click", function(e){
    e.preventDefault;

    // -> removing the class
    element.classList.remove("run-animation");

    // -> triggering reflow /* The actual magic */
    // without this it wouldn't work. Try uncommenting the line and the transition won't be retriggered.
    // This was, from the original tutorial, will no work in strict mode. Thanks Felis Phasma! The next uncommented line is
    // the fix.
    // element.offsetWidth = element.offsetWidth;

    void element.offsetWidth;

    // -> and re-adding the class
    element.classList.add("run-animation");
    }, false);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
