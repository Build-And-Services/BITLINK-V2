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
                        <form id="editForm" method="POST" action="{{ route('produsen.laporan.update', ['id' => $getLaporan->id_evaluasi]) }}">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="tgl_evaluasi" class="form-label">Tanggal Evaluasi</label>
                                <input type="date" id="tgl_evaluasi" name="tgl_evaluasi" class="form-control"
                                    value="{{ $getLaporan->tgl_evaluasi }}" placeholder="Masukkan tanggal evaluasi">
                            </div>
                            <div class="mb-3">
                                <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control"
                                    value="{{ Auth::user()->dataProdusen->nama_perusahaan }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="kinerja_produksi" class="form-label">Kinerja Produksi</label>
                                <input type="text" id="kinerja_produksi" name="kinerja_produksi" class="form-control"
                                    value="{{ $getLaporan->kinerja_produksi }}" placeholder="Masukkan kinerja produksi">
                            </div>
                            <div class="mb-3">
                                <label for="kualitas_benih">Kualitas Benih:</label>
                                <select name="kualitas_benih" id="kualitas_benih" class="form-control">
                                    <option value="{{ $getLaporan->kualitas_benih }}" style="text-transform: capitalize">
                                        {{ $getLaporan->kualitas_benih }}
                                    </option>
                                    <option value="Baik">
                                        Baik
                                    </option>
                                    <option value="Sangat Baik">
                                        Sangat Baik</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kendala_produksi" class="form-label">Kendala Produksi</label>
                                <input type="text" id="kendala_produksi" name="kendala_produksi"
                                    value="{{ $getLaporan->kendala_produksi }}" class="form-control"
                                    placeholder="Masukkan kendala produksi">
                            </div>
                            <div class="mb-3">
                                <label for="saran_produksi" class="form-label">Saran Perbaikan</label>
                                <input type="text" id="saran_produksi" name="saran_produksi"
                                    value="{{ $getLaporan->saran_produksi }}" class="form-control"
                                    placeholder="Masukkan saran perbaikan">
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                                <button type="button" id="resetBtn" style="border: 1px solid #7A5CFA"
                                    class="bg-light px-4 py-3">Batal</button>
                                <button type="submit" style="background-color: #7A5CFA"
                                    class="text-light px-4 py-3">Simpan</button>
                            </div>
                        </form>
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
