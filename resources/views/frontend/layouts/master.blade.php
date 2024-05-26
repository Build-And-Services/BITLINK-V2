<!doctype html>
<html class="no-js" lang="zxx">

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
        <script src="https://kit.fontawesome.com/29d4f5ffc9.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">



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

        {{-- <link rel="stylesheet" href={{asset("css/detail.css")}}> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{ config('midtrans.client_key') }}"></script>

        @stack('stylesheet')
    </head>

    <body>
        {{-- @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @elseif(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif --}}
        <div class="preloader">
            <div class="loader">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"
                    width="100" height="100"
                    style="shape-rendering: auto; display: block; background: transparent;"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <g>
                        <circle cx="50" cy="50" fill="none" stroke="#74b66e" stroke-width="10" r="35"
                            stroke-dasharray="164.93361431346415 56.97787143782138">
                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite"
                                dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                        </circle>
                        <g></g>
                    </g>
                </svg>
            </div>
        </div>

        <!-- Header Area -->
        <header class="header">
            <!-- Topbar -->
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-12">
                            <!-- Contact -->
                            <ul class="top-link">
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                            <!-- End Contact -->
                        </div>
                        <div class="col-lg-6 col-md-7 col-12">
                            <!-- Top Contact -->
                            <ul class="top-contact">
                                <li><i class="fa fa-phone"></i>+880 1234 56789</li>
                                <li><i class="fa fa-envelope"></i><a
                                        href="mailto:support@yourmail.com">{{ Auth::user()->email }}</a></li>
                                <li><i class="fa fa-user"></i><a href="{{ route('profile') }}">profile</a></li>
                            </ul>
                            <!-- End Top Contact -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Topbar -->
            <!-- Header Inner -->
            <div class="header-inner pb-0">
                <div class="container-fluid">
                    <div class="inner">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-lg-3 col-md-3 col-sm-8">
                                <!-- Start Logo -->
                                <div class="d-flex justify-content-center flex-row">
                                    <div class="col-sm-8">
                                        <div class="logo w-100 mt-0 p-2 text-center">
                                            <a href="http://127.0.0.1:8000/"><img src={{ asset('img/bitlink.png') }}
                                                    width="250" alt="#"></a>
                                        </div>

                                    </div>
                                    <!-- End Logo -->
                                    <div class="col-sm-4">
                                        <div class="mobile-nav"></div>
                                    </div>
                                    <!-- Mobile Nav -->

                                </div>
                                <!-- End Mobile Nav -->
                            </div>
                            <div class="">
                                <!-- Main Menu -->
                                <div class="main-menu">
                                    <nav class="navigation">
                                        <ul class="nav menu">
                                            <li class="{{ request()->segment(1) == 'padi' ? 'active' : '' }}">
                                                <a href="#">Produk Benih <i class="icofont-rounded-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('/padi') }}">Benih Padi</a></li>
                                                    <li><a href="{{ url('/kedelai') }}">Benih Kedelai</a></li>
                                                </ul>
                                            </li>
                                            @if (Auth::user()->role == 'AKUN DINAS')
                                                <li
                                                    class="{{ request()->segment(1) == 'manage-users' ? 'active' : '' }}">
                                                    <a href="#">Manage User <i
                                                            class="icofont-rounded-down"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="{{ route('pembeli.index') }}">Pembeli</a></li>
                                                        <li><a href="{{ route('produsen.index') }}">Produsen</a></li>
                                                    </ul>
                                                </li>
                                            @endif
                                            @if (Auth::user()->role == 'PRODUSEN')
                                                <li
                                                    class="{{ request()->segment(1) == 'monitoring' ? 'active' : '' }}">
                                                    <a href="{{url('/monitoring')}}">Monitoring</a>
                                                    {{-- <ul class="dropdown">
                                                        <li><a href="{{ url('/monitoring') }}">Monitoring</a></li>
                                                        <li><a href="{{ url('/monitoring/edukasi/produsen') }}">Edukasi</a></li>
                                                    </ul> --}}
                                                </li>
                                            @endif
                                            @if (Auth::user()->role == 'AKUN DINAS')
                                            <li class="{{ request()->segment(1) == 'monitoring-dinas' ? 'active' : '' }}">
                                                <a href="#">Monitoring <i class="icofont-rounded-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="{{ url('/monitoring-dinas/laporan-bulanan/dinas') }}">Laporan Kinerja</a></li>
                                                    <li><a href="{{ url('/monitoring-edukasi') }}">Edukasi</a></li>
                                                </ul>
                                            </li>
                                            @endif
                                            @if (Auth::user()->role != 'AKUN DINAS')
                                                <li class="{{ request()->segment(1) == 'pesanan' ? 'active' : '' }}"><a
                                                        href="{{ route('pesanan.index') }}">Pesanan</a></li>
                                                @if (Auth::user()->role == 'PRODUSEN')
                                                    <li
                                                        class="{{ request()->segment(1) == 'permintaan-pesanan' ? 'active' : '' }}">
                                                        <a href="{{ url('/permintaan-pesanan') }}">Permintaan Pesanan</a>
                                                    </li>
                                                @endif
                                            @endif
                                            <div class="get-quote">
                                                <a href="#" class="btn" data-toggle="modal" data-target="#exampleModal">LOG OUT</a>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5>Logout</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Pengguna telah keluar, silahkan login kembali untuk akses fitur lengkap bitlink</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/logout" class="btn btn-primary">Close</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </ul>
                                    </nav>
                                </div>
                                <!--/ End Main Menu -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Header Inner -->
        </header>
        <!-- End Header Area -->

        @yield('content')
        <!-- Footer Area -->
        <footer id="footer" class="footer">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>About Us</h2>
                                <p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut
                                    labore dolore magna.</p>
                                <!-- Social -->
                                <ul class="social">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-vimeo"></i></a></li>
                                    <li><a href="#"><i class="icofont-pinterest"></i></a></li>
                                </ul>
                                <!-- End Social -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer f-link">
                                <h2>Quick Links</h2>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Home</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>About Us</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Services</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Our
                                                    Cases</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Other Links</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Consuling</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Finance</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Testimonials</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>FAQ</a></li>
                                            <li><a href="#"><i class="fa fa-caret-right"
                                                        aria-hidden="true"></i>Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>Open Hours</h2>
                                <p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.
                                </p>
                                <ul class="time-sidual">
                                    <li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
                                    <li class="day">Saturday <span>9.00-18.30</span></li>
                                    <li class="day">Monday - Thusday <span>9.00-15.00</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="single-footer">
                                <h2>Newsletter</h2>
                                <p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit
                                    amet, consectetur adipisicing elit,</p>
                                <form action="mail/mail.php" method="get" target="_blank"
                                    class="newsletter-inner">
                                    <input name="email" placeholder="Email Address" class="common-input"
                                        onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Your email address'" required=""
                                        type="email">
                                    <button class="button"><i class="icofont icofont-paper-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Footer Top -->
            <!-- Copyright -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="copyright-content">
                                <p>© Copyright 2018 | All Rights Reserved by <a href="https://www.wpthemesgrid.com"
                                        target="_blank">wpthemesgrid.com</a> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Copyright -->
        </footer>
        <!--/ End Footer Area -->

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

        @stack('scripts')
    </body>

</html>
