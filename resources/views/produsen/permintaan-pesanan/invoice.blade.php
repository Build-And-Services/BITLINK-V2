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
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href={{asset("css/nice-select.css")}}>
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}}>
		<!-- icofont CSS -->
        <link rel="stylesheet" href={{asset("css/icofont.css")}}>
		<!-- Slicknav -->
		<link rel="stylesheet" href={{asset("css/slicknav.min.css")}}>
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href={{asset("css/owl-carousel.css")}}>
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href={{asset("css/datepicker.css")}}>
		<!-- Animate CSS -->
        <link rel="stylesheet" href={{asset("css/animate.min.css")}}>
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href={{asset("css/magnific-popup.css")}}>

		<!-- Medipro CSS -->
        <link rel="stylesheet" href={{asset("/css/normalize.css")}}>
        <link rel="stylesheet" href={{asset("style.css")}}>
        <link rel="stylesheet" href={{asset("css/responsive.css")}}>
        <script src="https://kit.fontawesome.com/29d4f5ffc9.js" crossorigin="anonymous"></script>

		{{-- <link rel="stylesheet" href={{asset("css/detail.css")}}> --}}

    </head>
    <body>

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

        <div class="card">
            <div class="card-body">
              <div class="container mb-5 mt-3">
                <div class="row d-flex  justify-content-between">
                  <div class="">
                    <a href="{{url('permintaan-pesanan')}}">
                        <i class="fa-regular fa-circle-left fa-2xl"></i>
                    </a>
                  </div>
                  <div class="" style="margin-left: 100px">
                    <div class="text-center">
                        <img src="{{asset('img/bitlink.png')}}" alt="">
                    </div>
                  </div>

                  <div class="">
                  </div>

                  <hr>
                </div>

                <div class="container " style="margin-top:100px">


                    <div class="row">
                        <div class="col-xl-8">
                            <ul class="list-unstyled">
                                <li class="text-dark text-uppercase "><span
                                        style="font-size:30px;font-weight:600">Invoice</span></li>
                                <li class="text-dark ">Billed to </li>
                                <li class="text-dark text-uppercase">{{ $getDetailInvoice->pembeli->name }}</li>
                                <li class="text-dark text-capitalize">{{ $getDetailInvoice->alamat_lengkap }}</li>
                            </ul>
                        </div>
                        <div class="col-xl-4 mt-3 text-lg-end" style="text-align: end">
                            <div class="" style="text-align: end;margin-right:4px">
                                <p class=" text-lg-end">{{ $getPerusahaan->nama_perusahaan }}</p>
                                <p class=" text-lg-end">{{ $getPerusahaan->alamat_lengkap }}</p>
                                <p class=" text-lg-end">{{ $getPerusahaan->nomor_legalitas_usaha }}</p>

                            </div>
                        </div>
                    </div>

                    <div class="row my-2 justify-content-between mt-4">
                        <div class="col-2">
                            <p class="" style="font-weight: bold">Invoice #</p>
                            <p style="font-style: italic">{{ $getDetailInvoice->id }}</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class="" style="font-weight: bold">Invoice Date</p>
                            <p style="font-style: italic">{{ $getDetailInvoice->created_at->format('d M Y') }}</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p class="" style="font-weight: bold">Reference</p>
                            <p style="font-style: italic">INV-057</p>
                            <br>
                            <br>
                            <br>
                            <p class="" style="font-weight: bold">Status</p>
                            <p style="font-style: italic">{{ $getDetailInvoice->status_pembayaran }}</p>
                        </div>
                        <div class="col">
                            <table class="table table-bordered rounded-3 overflow-hidden"
                                style="border: 1px solid black;max-height:200px">
                                <thead>
                                    <tr>
                                        <th scope="col">Pesanan</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $getDetailInvoice->benihData->varietas }}</td>
                                        <td>{{ $getDetailInvoice->quantity }}</td>
                                        <td>Rp{{ $getDetailInvoice->harga }}</td>
                                        <td>Rp{{ $getDetailInvoice->harga * $getDetailInvoice->quantity }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-primary">Total Pembayaran</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-primary">
                                            Rp{{ $getDetailInvoice->harga * $getDetailInvoice->quantity }}</td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>
                  {{-- <div class="row">
                    <div class="col-xl-8">
                      <p class="ms-3">Add additional notes and payment information</p>

                    </div>
                    <div class="col-xl-3">
                      <ul class="list-unstyled">
                        <li class="text-dark ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                        <li class="text-dark ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                      </ul>
                      <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                          style="font-size: 25px;">$1221</span></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-xl-10">
                      <p>Thank you for your purchase</p>
                    </div>
                    <div class="col-xl-2">
                      <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary text-capitalize"
                        style="background-color:#60bdf3 ;">Pay Now</button>
                    </div>
                  </div> --}}

                </div>
              </div>
            </div>
          </div>

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
