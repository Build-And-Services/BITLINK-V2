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
                        <a href="{{ route('pesanan.index') }}">
                            <i class="fa-regular fa-circle-left fa-2xl"></i>
                        </a>
                    </div>
                    <div class="" style="margin-left: 100px">
                        <div class="text-center">
                            <img src="{{ asset('/img/bitlink.png') }}" alt="">
                        </div>
                    </div>

                    <div class="">
                    </div>

                    <hr>
                </div>

                <div class="container "
                    style="margin-top:100px; display: grid; grid-template-columns: repeat(12, minmax(0, 1fr)); gap: 8px">
                    <div style="grid-column: span 8 / span 8;">
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
                    </div>
                    <div style="grid-column: span 4 / span 4; border-width: 2px; margin: 0px 8px 0px 8px">
                        <p style="font-weight: bold;text-align: center;" class="text-dark text-uppercase">cek status
                            pengiriman</p>
                        <div
                            style="background-color: #ebebeb;border-radius: 0.375rem; margin: 8px 8px 0px 8px; display: block; padding: 20px">
                            @csrf
                            <label for="id_pembayaran" class="text-dark">ID PEMBAYARAN</label>
                            <input id="id_pembayaran" name="id_pembayaran"
                                style="border-radius: 0.375rem;width: 100%; outline: none" type="text">
                            <button id="cek-pengiriman"
                                style="background-color: #4D4AE7; margin-top: 16px; margin-left: auto; margin-right: auto;display: block"
                                class="btn-sm btn-primary">Cek
                                Pengiriman</button>
                        </div>

                        <div id="status_pengiriman" style="display: none;margin: 20px 8px 0px 8px;">
                            <div style="border-radius: 0.375rem; border: 2px solid gray; " class="p-2">
                                <p class="text-dark text-capitalize text-dark">status pengiriman</p>
                                <div class="d-flex align-items-center" style="gap: 8px">
                                    <svg id="mobil-svg" width="24" height="21" viewBox="0 0 24 21"
                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <rect width="24" height="21" fill="url(#pattern0_371_1751)" />
                                        <defs>
                                            <pattern id="pattern0_371_1751" patternContentUnits="objectBoundingBox"
                                                width="1" height="1">
                                                <use xlink:href="#image0_371_1751"
                                                    transform="matrix(0.00195312 0 0 0.00223214 0 -0.0714286)" />
                                            </pattern>
                                            <image id="image0_371_1751" width="512" height="512"
                                                xlink:href="data:image/png;base64,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" />
                                        </defs>
                                    </svg>
                                    <div>
                                        <span class="badge text-uppercase"></span>
                                    </div>
                                    <button id="btn-diterima" class="btn-sm btn-success" style="margin-top: 20px; display: none">Pesanan Diterima</button>
                            </div>
                            <input id="id_pembayaran_result" style="display: none" type="text">
                            <button id="btn-acc" class="btn-sm btn-success"
                                style="margin-top: 20px; display: none">Pesanan
                                Diterima</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery Min JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('#btn-acc').on('click', function(e) {
            Swal.fire({
                title: "Apakah anda yakin?",
                icon: "question",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    var id_pembayaran_result = $('#id_pembayaran_result').val();

                    $.ajax({
                        url: "{{ route('pesanan.updateStatusPengiriman') }}",
                        method: "PUT",
                        data: {
                            id_pembayaran_result: id_pembayaran_result,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#status_pengiriman div span').removeClass(
                                'badge-success badge-warning badge-danger badge-info');
                            $('#status_pengiriman div span').text(response.status_pengiriman);
                            $('#status_pengiriman div span').addClass('badge-success');
                            $('#btn-acc').css('display', 'none');
                        },
                        error: function(xhr, status, error) {
                            console.log(error)
                        }
                    })
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#cek-pengiriman').on('click', function(e) {
                e.preventDefault();
                var id_pembayaran = $('#id_pembayaran').val();

                $.ajax({
                    url: "{{ route('pesanan.cekPengiriman') }}",
                    method: "POST",
                    data: {
                        id_pembayaran: id_pembayaran,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#status_pengiriman div span').removeClass(
                            'badge-success badge-warning badge-danger badge-info');
                        $('#status_pengiriman').css('display', 'block');
                        $('#mobil-svg').css('display', 'block');
                        if (response && response.status_pengiriman !== undefined) {
                            $('#status_pengiriman div span').text(response.status_pengiriman);
                            $('#id_pembayaran_result').val(id_pembayaran)
                            if (response.status_pengiriman === 'SEDANG DIKIRIM') {
                                $('#status_pengiriman div span').addClass('badge-warning');
                                $('#btn-acc').css('display', 'block')
                            } else if (response.status_pengiriman === 'DITERIMA') {
                                $('#status_pengiriman div span').addClass('badge-success');
                            } else if (response.status_pengiriman === 'PROSES') {
                                $('#status_pengiriman div span').addClass('badge-info');
                            }
                        } else {
                            $('#mobil-svg').css('display', 'none');
                            $('#status_pengiriman div span').text(
                                "Respons tidak mengandung status pengiriman.");
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#status_pengiriman div span').removeClass(
                            'badge-success badge-warning badge-danger');
                        $('#mobil-svg').css('display', 'none');
                        $('#status_pengiriman').css('display', 'block');
                        $('#status_pengiriman div span').text('Data Tidak Ditemukan');
                        $('#status_pengiriman div span').addClass('badge-danger');
                    }
                });
            });
        });
    </script>
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
