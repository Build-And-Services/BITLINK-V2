<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- Meta Tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="Site keywords here">
        <meta name="description" content="">
        <meta name='copyright' content=''>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>Bitlink-Nganjuk Nyawiji Mbangun Desa Noto Khuto.</title>

        <!-- Favicon -->
        <link rel="icon" href="img/bitlink.png">

        <!-- Google Fonts -->
        <link
            href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
            rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href={{ asset('css/bootstrap.min.css') }}>
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href={{ asset('css/nice-select.css') }}>
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href={{ asset('css/font-awesome.min.css') }}>
        <!-- icofont CSS -->
        <link rel="stylesheet" href={{ asset('css/icofont.css') }}>
        <!-- Slicknav -->
        <link rel="stylesheet" href={{ asset('css/slicknav.min.css') }}>
        <!-- Owl Carousel CSS -->
        <link rel="stylesheet" href={{ asset('css/owl-carousel.css') }}>
        <!-- Datepicker CSS -->
        <link rel="stylesheet" href={{ asset('css/datepicker.css') }}>
        <!-- Animate CSS -->
        <link rel="stylesheet" href={{ asset('css/animate.min.css') }}>
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href={{ asset('css/magnific-popup.css') }}>

        <!-- Medipro CSS -->
        <link rel="stylesheet" href={{ asset('/css/normalize.css') }}>
        <link rel="stylesheet" href={{ asset('style.css') }}>
        <link rel="stylesheet" href={{ asset('css/responsive.css') }}>
        <script src="https://kit.fontawesome.com/29d4f5ffc9.js" crossorigin="anonymous"></script>

        {{-- <link rel="stylesheet" href={{asset("css/detail.css")}}> --}}

    </head>

    <body>
        {{-- <link rel="stylesheet" href={{ asset('css/detail.css') }}> --}}
        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator">
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
        <main>
            <section>
                <div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row d-flex justify-content-between">
                                <div class="col-lg-1">
                                    <a href="{{ url('permintaan-pesanan') }}">
                                        <i class="fa-regular fa-circle-left fa-2xl"></i>
                                    </a>
                                </div>
                                <div class="col-lg-11 text-center">
                                    <img src="{{ asset('/img/bitlink.png') }}" width="200" alt="">
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-sm-12">
                            <div class="single-bibit">
                                <div class="image">
                                    <img src="{{ $getDetailDistribusi->benihData->foto_benih }}" alt="#">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <h5 class="font-weight-bold mt-4">Detail Produk</h5>
                            <form>
                                <fieldset disabled>
                                    <div class="row">
                                        <div class="col-lg-6 mt-3">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Varitas Benih</label>
                                                <input type="text" class="form-control" id="exampleInputtext1"
                                                    aria-describedby="textHelp"
                                                    value="{{ $getDetailDistribusi->benihData->varietas }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Kelas</label>
                                                <input type="text" class="form-control" id="exampleInputtext1"
                                                    value="{{ $getDetailDistribusi->benihData->kualitas_benih }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Jumlah Pesanan</label>
                                                <input type="text" class="form-control" id="exampleInputtext1"
                                                    value="{{ $getDetailDistribusi->quantity }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-3">
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Jenis</label>
                                                <input type="text" class="form-control" id="exampleInputtext1"
                                                    aria-describedby="textHelp"
                                                    value="{{ $getDetailDistribusi->benihData->jenis_benih }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext1" class="form-label">Harga</label>
                                                <input type="text" class="form-control" id="exampleInputtext1"
                                                    value="Rp {{ $getDetailDistribusi->benihData->harga_benih }} ,00">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <a href="{{ route('track.distribusi', $getDetailDistribusi->id) }}" style="color: #fff"
                                    class="btn-primary">Track
                                    Distribusi </a>
                            </form>
                        </div>
                    </div>
                </div>

            </section>
        </main>
        <!-- jquery Min JS -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- jquery Migrate JS -->
        <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
        <!-- jquery Ui JS -->
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <!-- Easing JS -->
        <script src="{{ asset('js/easing.js') }}"></script>
        <!-- Color JS -->
        <script src="{{ asset('js/colors.js') }}"></script>
        <!-- Popper JS -->
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <!-- Bootstrap Datepicker JS -->
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
        <!-- Jquery Nav JS -->
        <script src="{{ asset('js/jquery.nav.js') }}"></script>
        <!-- Slicknav JS -->
        <script src="{{ asset('js/slicknav.min.js') }}"></script>
        <!-- ScrollUp JS -->
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <!-- Niceselect JS -->
        <script src="{{ asset('js/niceselect.js') }}"></script>
        <!-- Tilt Jquery JS -->
        <script src="{{ asset('js/tilt.jquery.min.js') }}"></script>
        <!-- Owl Carousel JS -->
        <script src="{{ asset('js/owl-carousel.js') }}"></script>
        <!-- counterup JS -->
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <!-- Steller JS -->
        <script src="{{ asset('js/steller.js') }}"></script>
        <!-- Wow JS -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
        <!-- Magnific Popup JS -->
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <!-- Counter Up CDN JS -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('js/main.js') }}"></script>
        <script src="{{ asset('js/tambahbibit.js') }}"></script>
    </body>

</html>
