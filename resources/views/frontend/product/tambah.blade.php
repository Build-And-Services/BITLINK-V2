@extends('frontend.layouts.master')
@section('content')
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
                    <form method="POST" action="{{ route('BenihData.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="tambah-bibit-inner col-7">
                                <h2>Tambah Produk Benih</h2>
                                    <!-- Input untuk atribut Benih -->

                                <div class="form-group">
                                    <label for="varietas">Varietas Benih</label>
                                    <input type="text" class="form-control" id="varietas" name="varietas" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')"> 
                                </div>
                                <div class="form-group">
                                    <label for="varietas">CV</label>
                                    <input type="text" class="form-control" id="varietas"
                                        value="{{ $getPerusahaan->dataProdusen->nama_perusahaan }}" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group ml-3">
                                        <label for="jenis_benih">Jenis Benih</label>
                                        <select class="form-control" aria-label="Default select example" id="jenis_benih"
                                            name="jenis_benih" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                            <option value="padi">Padi</option>
                                            <option value="kedelai">Kedelai</option>
                                        </select>
                                    </div>
                                    <div class="form-group ml-5 mt-1">
                                        <label for="kualitas_benih">Kelas Benih</label>
                                        <select class="form-control" aria-label="Default select example" id="kualitas_benih"
                                            name="kualitas_benih" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                            <option value="Benih Penjenis(BS)">Benih Penjenis(BS)</option>
                                            <option value="Benih Dasar(BD)">Benih Dasar(BD)</option>
                                            <option value="Benih Pokok(BP)">Benih Pokok(BP)</option>
                                            <option value="Benih Sebar(BR)">Benih Sebar(BR)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stok_benih">Stok Benih</label>
                                    <input type="number" class="form-control" id="stok_benih" name="stok_benih" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="harga_benih">Harga Benih</label>
                                    <input type="number" class="form-control" id="harga_benih" name="harga_benih" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="turun_gudang">Turun Gudang</label>
                                    <input type="number" class="form-control" id="turun_gudang" name="turun_gudang" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="jemur_kering">Jemur Kering</label>
                                    <input type="number" class="form-control" id="jemur_kering" name="jemur_kering" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="blower1">Blower 1</label>
                                    <input type="number" class="form-control" id="blower1" name="blower1" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="benih_susut">Benih Susut</label>
                                    <input type="number" class="form-control" id="benih_susut" name="benih_susut" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="biji_kecil">Biji Kecil</label>
                                    <input type="number" class="form-control" id="biji_kecil" name="biji_kecil" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_benih">Jumlah Benih</label>
                                    <input type="number" class="form-control" id="jumlah_benih" name="jumlah_benih"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    {{-- <label for="id_akunp">ID Akun Produsen</label> --}}
                                    <input type="hidden" class="form-control" value="{{ Auth::user()->id }}" id="id_akunp"
                                        name="id_akunp" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    <input type="hidden" class="form-control" value="{{ Auth::user()->id }}">
                                </div>
                            </div>
                            <div class="col-5 align-self-center">
                                {{-- <div class="form-group">
                                    <label for="foto_benih">Foto Benih</label>
                                    <input type="file" class="form-control-file" id="foto_benih" name="foto_benih"
                                        accept="image/*" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">>
                                </div> --}}

                                <button class="close-button ml-4" onclick="cancelUpload()" id="cancel-button" type="button" style="display: none;">X</button>
                                <div id="image-upload" class="text-center">
                                    <img src="" class="mx-auto" alt="Preview" id="preview-image">
                                    <button class="upload-button btn-primary btn-sm mt-4" type="button" onclick="openFileUploader()" style="width: 360px">Unggah Gambar</button>
                                    <input type="file" id="file-input" name="foto_benih" style="display: none;" onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-success btn-sm" style="width: 750px">Simpan</button>
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
    <script src="{{ asset('js/tambah.js') }}"></script>
    <script>
        function openFileUploader() {
          document.getElementById('file-input').click();
        }
        

        function previewImage(event) {
          var input = event.target;
          var reader = new FileReader();
          reader.onload = function() {
            var dataURL = reader.result;
            var preview = document.getElementById('preview-image');
            preview.src = dataURL;
            preview.style.display = 'block';
            document.getElementById('cancel-button').style.display = 'inline-block';
          };
          reader.readAsDataURL(input.files[0]);
        }

        function cancelUpload() {
          document.getElementById('preview-image').src = '';
          document.getElementById('preview-image').style.display = 'none';
          document.getElementById('cancel-button').style.display = 'none';
          document.getElementById('file-input').value = '';
        }
      </script>
      
@stop
