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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



    <style>
        .nice-select {
            -webkit-tap-highlight-color: transparent;
            background-color: #fff;
            border-radius: 5px;
            border: solid 1px #e8e8e8;
            box-sizing: border-box;
            clear: both;
            cursor: pointer;
            display: block;
            float: left;
            font-family: inherit;
            font-size: 15px;
            font-weight: normal;
            height: 42px;
            line-height: 27px;
            outline: none;
            padding-left: 18px;
            padding-right: 30px;
            position: relative;
            text-align: left !important;
            -webkit-transition: all 0.2s ease-in-out;
            transition: all 0.2s ease-in-out;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            white-space: nowrap;
            /* width: auto; */
            margin-bottom: 16px;
        }

        .nice-select:hover {
            border-color: #3164f4;
        }

        .nice-select:active,
        .nice-select.open,
        .nice-select:focus {
            border-color: #999;
        }

        .nice-select:after {
            border-bottom: 2px solid #999;
            border-right: 2px solid #999;
            content: "";
            display: block;
            height: 8px;
            margin-top: -4px;
            pointer-events: none;
            position: absolute;
            right: 12px;
            top: 50%;
            -webkit-transform-origin: 66% 66%;
            -ms-transform-origin: 66% 66%;
            transform-origin: 66% 66%;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-transition: all 0.15s ease-in-out;
            transition: all 0.15s ease-in-out;
            width: 8px;
        }

        .nice-select.open:after {
            -webkit-transform: rotate(-135deg);
            -ms-transform: rotate(-135deg);
            transform: rotate(-135deg);
        }

        .nice-select.open .list {
            opacity: 1;
            pointer-events: auto;
            -webkit-transform: scale(1) translateY(0);
            -ms-transform: scale(1) translateY(0);
            transform: scale(1) translateY(0);
        }

        .nice-select.disabled {
            border-color: #ededed;
            color: #999;
            pointer-events: none;
        }

        .nice-select.disabled:after {
            border-color: #cccccc;
        }

        .nice-select.wide {
            width: 100%;
        }

        .nice-select.wide .list {
            left: 0 !important;
            right: 0 !important;
        }

        .nice-select.right {
            float: right;
        }

        .nice-select.right .list {
            left: auto;
            right: 0;
        }

        .nice-select.small {
            font-size: 12px;
            height: 36px;
            line-height: 34px;
        }

        .nice-select.small:after {
            height: 4px;
            width: 4px;
        }

        .nice-select.small .option {
            line-height: 34px;
            min-height: 34px;
        }

        .nice-select .list {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 0 1px rgba(68, 68, 68, 0.11);
            box-sizing: border-box;
            margin-top: 4px;
            opacity: 0;
            overflow: hidden;
            padding: 0;
            pointer-events: none;
            position: absolute;
            top: 100%;
            left: 0;
            -webkit-transform-origin: 50% 0;
            -ms-transform-origin: 50% 0;
            transform-origin: 50% 0;
            -webkit-transform: scale(0.75) translateY(-21px);
            -ms-transform: scale(0.75) translateY(-21px);
            transform: scale(0.75) translateY(-21px);
            -webkit-transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25),
                opacity 0.15s ease-out;
            transition: all 0.2s cubic-bezier(0.5, 0, 0, 1.25), opacity 0.15s ease-out;
            z-index: 9;
        }

        .nice-select .list:hover .option:not(:hover) {
            background-color: transparent !important;
        }

        .nice-select .option {
            cursor: pointer;
            font-weight: 400;
            line-height: 40px;
            list-style: none;
            min-height: 40px;
            outline: none;
            padding-left: 18px;
            padding-right: 29px;
            text-align: left;
            -webkit-transition: all 0.2s;
            transition: all 0.2s;
        }

        .nice-select .option:hover {
            background-color: #238ac1;
            color: #fff;
        }

        .nice-select .option.selected {
            font-weight: bold;
        }

        .nice-select .option.disabled {
            background-color: transparent;
            color: #999;
            cursor: default;
        }

        .no-csspointerevents .nice-select .list {
            display: none;
        }

        .no-csspointerevents .nice-select.open .list {
            display: block;
        }

        .contact-form-wrapper .list {
            background: #2f3341 none repeat scroll 0 0;
            border-radius: 0;
        }
    </style>
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
                                <a href="{{ route('distribusi.pesanan', $distribusiPesanan->id) }}">
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
        <section class="my-5">
            <div class="container">
                <div class="col-lg-6 col-sm-12 mx-auto">
                    <h5 class="font-weight-bold mb-3 text-center">Form Track Distribusi</h5>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('track.distribusi.update', $distribusiPesanan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $distribusiPesanan->id }}">
                        <div class="mb-3">
                            <label for="pembayaranID" class="form-label">ID Pembayaran</label>
                            <input type="text" disabled class="form-control" id="pembayaranID"
                                value="{{ $distribusiPesanan->id }}" />
                        </div>
                        <div class="mb-3">
                            <label for="NamaPembeli" class="form-label">Nama Pembeli</label>
                            <input type="text" disabled class="form-control" id="NamaPembeli"
                                value="{{ $distribusiPesanan->pembeli->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamatPembeli" class="form-label">Alamat Pembeli</label>
                            <input type="text" disabled class="form-control" id="alamatPembeli"
                                value="{{ $distribusiPesanan->alamat_lengkap }}">
                        </div>
                        <div class="mb-3">
                            <label for="totalPembayaran" class="form-label">Total Pembayaran</label>
                            <input type="text" disabled class="form-control" id="totalPembayaran"
                                value="{{ $distribusiPesanan->harga * $distribusiPesanan->quantity }}" />
                        </div>
                        <div class="mb-3">
                            <label for="tanggalPembelian" class="form-label">Tanggal Pembelian</label>
                            <input type="text" disabled class="form-control" id="tanggalPembelian"
                                value="{{ $distribusiPesanan->created_at->format('d M Y') }}">
                        </div>
                        <div class="input-group d-block mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select w-100" style="background-color: black" aria-label=""
                                name="status_pengiriman" id="status_pengiriman"
                                {{ $distribusiPesanan->status_pengiriman == 'DITERIMA' ? 'disabled' : '' }}>
                                @foreach (['PROSES', 'SEDANG DIKIRIM', 'DITERIMA'] as $value)
                                    <option value="{{ $value }}"
                                        {{ $value == $distribusiPesanan->status_pengiriman ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-75 mx-auto mt-5">
                            <button type="submit" style="color: #fff"
                                class="btn-primary w-100 mb-5 mt-5">Simpan</button>
                        </div>
                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous">
    </script>
</body>

</html>
