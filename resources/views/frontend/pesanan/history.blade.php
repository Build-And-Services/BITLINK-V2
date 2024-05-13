@extends('frontend.layouts.master')
@section('content')
    <link rel="stylesheet" href={{ asset('css/detail.css') }}>
    <section class="detail-bibit section">
        <div class="container">
            <div class="">
                <a href="{{url('pesanan')}}">
                    <i class="fa-regular fa-circle-left fa-2xl"></i>
                </a>
              </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="single-bibit">
                        <div class="image">
                            <img src="{{ $getRiwayat->benihData->foto_benih }}" alt="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <h2>Detail Bibit</h2> --}}
                    <div class="single-bibit">
                        <div class="content">
                            <h2>Detail Produk</h2>
                            <h4>{{ $getRiwayat->benihData->varietas }}</h4>
                            <p class="mrh text-merah">Rp {{ number_format($getRiwayat->harga, 0, ',', '.') }} /Kg</p>
                            <p>
                                <span class="badge text-bg-warning bg-yellow">{{ $getPerusahaan->nama_perusahaan }}</span>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <p class="text-with-underline d-block">Stok: {{ $getRiwayat->benihData->stok_benih }} Kg</p>
                                    <p class="text-with-underline d-block">Jenis: {{ $getRiwayat->benihData->jenis_benih }}</p>
                                    <p class="text-with-underline d-block">Kelas Benih: {{ $getRiwayat->benihData->kualitas_benih }}</p>
                                    <p class="text-with-underline d-block">Tanggal Masuk: {{ Carbon\Carbon::parse($getRiwayat->benihData->tgl_masuk)->format('d M Y') }}</p>
                                </div>
                                <div class="col">
                                    <p class="text-with-underline d-block">Turun Gudang : {{ $getRiwayat->benihData->turun_gudang }} Kg</p>
                                    <p class="text-with-underline d-block">Jemur Kering: {{ $getRiwayat->benihData->jemur_kering }} Kg</p>
                                    <p class="text-with-underline d-block">Blower: {{ $getRiwayat->benihData->blower1 }} Kg</p>
                                    <p class="text-with-underline d-block">Benih Susut: {{ $getRiwayat->benihData->benih_susut }} Kg</p>
                                    <p class="text-with-underline d-block">Biji Kecil: {{ $getRiwayat->benihData->biji_kecil }} Kg</p>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <h2>Informasi Pesanan</h2>
                            <div class="d-flex">
                                <h4>Jumlah Pesanan : {{ $getRiwayat->quantity }}</h4>
                                <p class="mrh text-merah ml-2">Harga Total : Rp {{ number_format($getRiwayat->quantity * $getRiwayat->harga, 0, ',', '.') }} /Kg</p>

                            </div>
                            <div>
                                <label for="">Status Pengiriman :</label>
                                <p class=" alert @if ($getRiwayat->status_pengiriman == 'PROSES')  alert-warning @elseif ($getRiwayat->status_pengiriman == 'SEDANG DIKIRIM') alert-info @else alert-success @endif "> {{ $getRiwayat->status_pengiriman }}</p>
                                <label for="">Status Pembayaran :</label>
                                <p class=" alert @if ($getRiwayat->status_pembayaran == 'BELUM DIBAYAR')  alert-warning @elseif ($getRiwayat->status_pembayaran == 'SUKSES') alert-success @else alert-danger @endif ">{{ $getRiwayat->status_pembayaran }}</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('js/detail.js') }}"></script>
@endsection
