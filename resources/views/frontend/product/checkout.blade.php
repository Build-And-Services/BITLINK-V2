@extends('frontend.layouts.master')

@section('content')
    <section class="container py-5">
        <form action="/checkout" method="POST">
            @csrf
            <input type="hidden" name="id_benih" value="{{ $benih->id_benih }}">
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h4>Detail Pembeli</h4>
                    <div class="card mt-4 p-4" style="border-color: blue">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 p-0">
                                    <div class="mb-3 w-full">
                                        <label for="nama_penerima" class="form-label text-dark">Nama Penerima</label>
                                        <input type="text" id="nama_penerima" name="nama_penerima" class="form-control"
                                            style="background-color: transparent" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="mb-3 w-full">
                                        <label for="alamat_lengkap" class="form-label text-dark">Alamat</label>
                                        <input type="text" id="alamat_lengkap" name="alamat_lengkap" class="form-control"
                                            style="background-color: transparent" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="mb-3">
                                        <label for="telepon" class="form-label text-dark">Telepon</label>
                                        <input type="text" id="telepon" name="telepon" class="form-control"
                                            style="background-color: transparent" required oninvalid="this.setCustomValidity('data harus diisi!!')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6">
                    <h4>Detail Produk</h4>
                    <div class="card mt-4 p-4" style="border-color: blue">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <img src="{{ $benih->foto_benih }}" alt="img-thumbnail" class="img-thumbnail col-md-5 p-0">
                                <div class="col-md-6 p-0">
                                    <div class="mb-3 w-full">
                                        <label for="varietas" class="form-label text-dark">Varietas Benih</label>
                                        <input type="text" value="{{ $benih->varietas }}" class="form-control"
                                            style="background-color: transparent" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlah_pesanan" class="form-label text-dark">Jumlah Pesanan</label>
                                        <input type="text" value="{{ $quantity }}" class="form-control"
                                            name="quantity" id="quantity" style="background-color: transparent" readonly>
                                    </div>
                                    <div>
                                        <label for="harga" class="form-label text-dark">Harga</label>
                                        <input type="text" value="{{ $benih->harga_benih }}" class="form-control"
                                            name="harga" style="background-color: transparent" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="background-color: #F0F0F0">
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <h6>Total Tagihan</h6>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <h6 style="text-align: end">Rp
                                            {{ number_format($quantity * $benih->harga_benih, 0, ',', '.') }}</h6>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success text-center mt-3 col-md-12">Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('error'))
        <script>
            Swal.fire({
                title: "{{ session('error') }}",
                icon: "error",
            })
        </script>
    @endif

    
@endsection
