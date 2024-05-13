@extends('frontend.layouts.master')
@section('content')


    <section class="edit-bibit section">
        <link rel="stylesheet" href={{ asset('css/edit.css') }}>
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
        </style>
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
                    <form action="{{ route('BenihData.update', $benihData->id_benih) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <input type="hidden" name="id_benih" value="{{ $benihData->id_benih }}">
                            <input type="hidden" name="id_akunp" value="{{ $benihData->id_akunp }}">

                            <div class="tambah-bibit-inner col-7">
                                <h2>Edit Data Produk Benih</h2>
                                <!-- Input untuk atribut Benih -->

                                <div class="form-group">
                                    <label for="varietas">Varietas:</label>
                                    <input type="text" name="varietas" id="varietas"
                                        value="{{ old('varietas', $benihData->varietas) }}" class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('varietas')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="varietas">CV</label>
                                    <input type="text" class="form-control" id="varietas"
                                        value="{{ $perusahaan->dataProdusen->nama_perusahaan }}" readonly>
                                </div>
                                <div class="row">
                                    <div class="form-group ml-3">
                                        <label for="jenis_benih">Jenis Benih:</label>
                                        <select name="jenis_benih" id="jenis_benih" class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                            <option value="{{ old('jenis_benih', $benihData->jenis_benih) }}">
                                                {{ $benihData->jenis_benih }}</option>
                                            <option value="padi"
                                                {{ old('jenis_benih', $benihData->jenis_benih) == 'padi' ? 'selected' : '' }}>
                                                Padi
                                            </option>
                                            <option value="kedelai"
                                                {{ old('jenis_benih', $benihData->jenis_benih) == 'kedelai' ? 'selected' : '' }}>
                                                Kedelai</option>
                                        </select>
                                        @error('jenis_benih')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group ml-5 mt-1">
                                        <label for="kualitas_benih">Kelas Benih:</label>
                                        <input type="text" name="kualitas_benih" id="kualitas_benih"
                                            value="{{ old('kualitas_benih', $benihData->kualitas_benih) }}"
                                            class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                        @error('kualitas_benih')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="stok_benih">Stok Benih:</label>
                                    <input type="number" name="stok_benih" id="stok_benih"
                                        value="{{ old('stok_benih', $benihData->stok_benih) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('stok_benih')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="harga_benih">Harga Benih:</label>
                                    <input type="number" name="harga_benih" id="harga_benih"
                                        value="{{ old('harga_benih', $benihData->harga_benih) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('harga_benih')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tgl_masuk">Tanggal Masuk:</label>
                                    <input type="date" name="tgl_masuk" id="tgl_masuk"
                                        value="{{ old('tgl_masuk', $benihData->tgl_masuk) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('tgl_masuk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="turun_gudang">Turun Gudang:</label>
                                    <input type="number" name="turun_gudang" id="turun_gudang"
                                        value="{{ old('turun_gudang', $benihData->turun_gudang) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('turun_gudang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jemur_kering">Jemur Kering:</label>
                                    <input type="number" name="jemur_kering" id="jemur_kering"
                                        value="{{ old('jemur_kering', $benihData->jemur_kering) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('jemur_kering')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="blower1">Blower 1:</label>
                                    <input type="number" name="blower1" id="blower1"
                                        value="{{ old('blower1', $benihData->blower1) }}" class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('blower1')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="benih_susut">Benih Susut:</label>
                                    <input type="number" name="benih_susut" id="benih_susut"
                                        value="{{ old('benih_susut', $benihData->benih_susut) }}" class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('benih_susut')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="biji_kecil">Biji Kecil:</label>
                                    <input type="number" name="biji_kecil" id="biji_kecil"
                                        value="{{ old('biji_kecil', $benihData->biji_kecil) }}" class="form-control" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('biji_kecil')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_benih">Jumlah Benih:</label>
                                    <input type="number" name="jumlah_benih" id="jumlah_benih"
                                        value="{{ old('jumlah_benih', $benihData->jumlah_benih) }}" class="form-control"
                                        required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    @error('jumlah_benih')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                    <label for="id_akunp">ID Akun Produsen</label>
                                    <input type="hidden" class="form-control" value="{{ Auth::user()->id }}"
                                        id="id_akunp" name="id_akunp" required>
                                </div> --}}
                            </div>
                            <div class="col-5 align-self-center">
                                {{-- <div class="form-group">
                                    <label for="foto_benih">Foto Benih</label>
                                    <input type="file" class="form-control-file" id="foto_benih" name="foto_benih"
                                        accept="image/*" required>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="gambar_lama" class="form-label">Gambar Lama:</label><br>
                                    <img src="{{ asset($benihData->foto_benih) }}" alt="Gambar Lama" width="200">
                                </div>

                                <button class="close-button ml-4" onclick="cancelUpload()" id="cancel-button"
                                    type="button" style="display: none;">X</button>
                                <div id="image-upload" class="text-center">
                                    <img src="" class="mx-auto" alt="Preview" id="preview-image">
                                    <button class="upload-button btn-primary mt-4 mx-auto" type="button"
                                        onclick="openFileUploader()" style="width: 360px">Unggah Gambar</button>
                                    <input type="file" id="file-input" name="foto_benih" style="display: none;"
                                        onchange="previewImage(event)">
                                </div>
                            </div>
                            <div class="mx-auto">
                                <button type="submit" class="btn btn-success btn-sm"
                                    style="width: 750px">Simpan</button>
                            </div>
                    </form>
                </div>


            </div>
        </div>
    </section>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
