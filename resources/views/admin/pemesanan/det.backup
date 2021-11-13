<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Responsive Smooth Card Carousel Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <style>
        html {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        html body {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            font-family: 'Quicksand', sans-serif;
            overflow-x: hidden;
            position: relative;
            top: -2.5rem;
        }

        html body .heading {
            text-align: center;
            color: #2e5266;
            margin-bottom: 3rem;
        }

        html body .heading h1 {
            margin-bottom: 0;
        }

        html body .heading h6 {
            margin: 0;
        }

        html body .heading p {
            margin: 0;
        }

        html body .heading a {
            color: #2e5266;
            display: inline-block;
        }

        html body .heading a .fab {
            margin-right: 0.5rem;
            font-size: 1.5rem;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .card-carousel {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .card-carousel .my-card {
            width: 12rem;
            position: relative;
            z-index: 1;
            -webkit-transform: scale(0.6) translateY(-2rem);
            transform: scale(0.6) translateY(-2rem);
            opacity: 0;
            cursor: pointer;
            pointer-events: none;
            /* background: #2e5266;
            background: linear-gradient(to top, #2e5266, #6e8898); */
            transition: 1s;
        }

        .card-carousel .my-card:after {
            content: '';
            position: absolute;
            height: 2px;
            width: 100%;
            border-radius: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            bottom: -5rem;
            -webkit-filter: blur(4px);
            filter: blur(4px);
        }

        .card-carousel .my-card.active {
            z-index: 3;
            -webkit-transform: scale(1) translateY(0) translateX(0);
            transform: scale(1) translateY(0) translateX(0);
            opacity: 1;
            pointer-events: auto;
            transition: 1s;
        }

        .card-carousel .my-card.prev,
        .card-carousel .my-card.next {
            z-index: 2;
            -webkit-transform: scale(0.8) translateY(-1rem) translateX(0);
            transform: scale(0.8) translateY(-1rem) translateX(0);
            opacity: 0.6;
            pointer-events: auto;
            transition: 1s;
        }
    </style>
</head>

<body>
    <div class="heading">
        <h1>Responsive Smooth Card Carousel</h1>
    </div>
    <div class="card shadow" style="padding: 30px 0">
        <div class="card-carousel">
            <div class="my-card" style="text-align: center">
                <h5>Pemesanan</h5>
                <img src="{{ asset('asset_img/order.png') }}" alt="" width="200px">
            </div>
            <div class="my-card">
                <h5>Pemotongan bahan</h5>
                <img src="{{ asset('asset_img/potong.png') }}" alt="" width="200px">
            </div>
            <div class="my-card">
                <h5>Sedang dijahit</h5>
                <img src="{{ asset('asset_img/jait.png') }}" alt="" width="200px">
            </div>
            <div class="my-card ">
                <h5>Proses Mengolah</h5>
                <img src="{{ asset('asset_img/olah.png') }}" alt="" width="200px">
            </div>
            <div class="my-card">
                <h5>Dalam Proses Setrika</h5>
                <img src="{{ asset('asset_img/setirka.png') }}" alt="" width="200px">
            </div>
            <div class="my-card">
                <h5>Sedang dikemas</h5>
                <img src="{{ asset('asset_img/packing.png') }}" alt="" width="200px">
            </div>
            <div class="my-card ">
                <h5>Barang siap dikirim</h5>
                <img src="{{ asset('asset_img/siap.png') }}" alt="" width="200px">
                <h5>beberapa menit lalu</h5>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous">
    </script>
    <script>
        $num = $('.my-card').length;
$even = $num / 2;
$odd = ($num + 1) / 2;

if ($num % 2 == 0) {
  $('.my-card:nth-child(' + $even + ')').addClass('active');
  $('.my-card:nth-child(' + $even + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $even + ')').next().addClass('next');
} else {
  $('.my-card:nth-child(' + $odd + ')').addClass('active');
  $('.my-card:nth-child(' + $odd + ')').prev().addClass('prev');
  $('.my-card:nth-child(' + $odd + ')').next().addClass('next');
}

$('.my-card').click(function() {
  $slide = $('.active').width();
  console.log($('.active').position().left);

  if ($(this).hasClass('next')) {
    $('.card-carousel').stop(false, true).animate({left: '-=' + $slide});
  } else if ($(this).hasClass('prev')) {
    $('.card-carousel').stop(false, true).animate({left: '+=' + $slide});
  }

  $(this).removeClass('prev next');
  $(this).siblings().removeClass('prev active next');

  $(this).addClass('active');
  $(this).prev().addClass('prev');
  $(this).next().addClass('next');
});


// Keyboard nav
$('html body').keydown(function(e) {
  if (e.keyCode == 37) { // left
    $('.active').prev().trigger('click');
  }
  else if (e.keyCode == 39) { // right
    $('.active').next().trigger('click');
  }
});
    </script>

</body>

</html>
