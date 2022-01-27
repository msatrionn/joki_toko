<nav id="sidebar" class="active">
    <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
        </button>
    </div>
    <div class="p-4">
        <h1><a href="index.html" class="logo">Baraka</a></h1>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="{{ url('admin/dashboard') }}"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="{{ route('produk.index') }}"><span class="fa fa-briefcase mr-3"></span> Produk</a>
            </li>
            <li>
                <a href="{{ route('pembeli.index') }}"><span class="fa fa-user  mr-3"></span> Pembeli</a>
            </li>
            @if (auth()->user()->level=='admin')
            <li>
                <a href="{{ route('karyawan.index') }}"><span class="fa fa-sticky-note mr-3"></span> Karyawan</a>
            </li>
            @endif
            <li>
                <a href="{{ route('pemesanan.index') }}"><span class="fa fa-paper-plane mr-3"></span> Pemesanan</a>
            </li>
            <li>
                <a href="{{ route('pemesanan.laporan') }}"><span class="fa fa-sticky-note mr-3"></span> Laporan
                    Pemesanan</a>
            </li>
            <li>
                <a href="{{ route('logout') }}"><span class="fa fa-sign-out mr-3"></span> logout</a>
            </li>
        </ul>



        <div class="footer">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i>
                by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>

    </div>
</nav>
