@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <link rel="stylesheet" href={{ asset('css/tambah.css') }}>
        <style>
            .upload-button {
                /* background-color: #4CAF50; */
                color: white;
                /* padding: 10px 20px;
        border: none;
        border-radius: 5px; */
                cursor: pointer;
            }

            .close-button {
                background-color: #f44336;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            #preview-image {
                max-width: 300px;
                display: none;
            }

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
        <!-- Tambah Bibit Section -->
        <section class="tambah-bibit section">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <!-- Tambah Bibit Inner -->
                        <div class="card text-light" style="background-color: #01B2B7">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <div class="mt-3">
                                    <span>Edukasi</span>
                                    <h4>{{$getEdukasi->judul_edukasi}}</h4>
                                    <a>Ditambahkan oleh : {{$getEdukasi->nama_produsen}} {{$getEdukasi->nama_dinas}}</i></a>
                                    <h6>Dibuat pada tanggal : {{$getEdukasi->tanggal_edukasi}}</h6>
                                    <p class="text-light mt-3 pb-5">{{$getEdukasi->isi_edukasi}}</p>
                                </div>
                                {{-- <div class="mt-3">
                                    <a class="btn-warning px-3 py-2 rounded mr-2" href="{{url('/monitoring-edukasi/show', $getEdukasi->id_edukasi)}}">
                                        Lihat Detail
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Tambah Bibit Inner -->
            </div>
    </div>
    </div>
    </section>
    <!--/ End Tambah Bibit Section -->
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var resetBtn = document.getElementById("resetBtn");

            // Event listener untuk klik tombol reset
            resetBtn.addEventListener("click", function() {
                // Ambil semua input fields
                var inputFields = document.querySelectorAll('#editForm input[type="text"]:not([readonly]), #editForm input[type="date"]:not([readonly])');
                // Loop melalui input fields dan set nilai menjadi kosong
                inputFields.forEach(function(input) {
                    input.value = '';
                });
            });
        });
    </script>
@endsection
