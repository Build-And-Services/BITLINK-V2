@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href={{asset("css/detail.css")}}>
     <!-- Detail Bibit -->
    <section class="detail-bibit section">
        @foreach ($getPermintaanPesanan as $item)
        <div class="container">

            <div class="row">
                <div class="col-lg-5">
                    <div class="single-bibit">
                        <div class="image">
                            <img src="{{$item->benihData->foto_benih}}" alt="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5">
                    {{-- <h2>Detail Bibit</h2> --}}

                    <h2>Detail Produk</h2>
                    <div class="single-bibit row align-items-center" style="height: 300px">
                        <div class="col-12">
                            <div class="content " style="height: auto">
                                <p class="text-with-underline" >Varietas : {{$item->benihData->varietas}}</p>
                                <p class="text-with-underline my-3" >Jenis    : {{$item->benihData->jenis_benih}}</p>
                                <p class="text-with-underline" >Kelas    : {{$item->benihData->kualitas_benih}}</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex">
                                <a href="{{route('distribusi.pesanan', $item->id)}}" class="btn btn-primary">Status Pesanan</a>
                                <a href="{{url('permintaan-pesanan/invoice', $item->id)}}" class="btn btn-primary ml-2">Invoice</a>
                            </div>

                        </div>

                        <!-- Pop-up konfirmasi -->
                        {{-- <div class="confirmation-popup" id="confirmation-popup">
                            <h2>Apakah Anda yakin akan menghapus data?</h2>
                            <button id="confirm-delete" class="btn btn-danger">Ya</button>
                            <button id="cancel-delete" class="btn btn-primary">Tidak</button>
                        </div>

                        <script>
                        document.getElementById('delete-button').addEventListener('click', function(event) {
                            event.preventDefault();
                            document.getElementById('confirmation-popup').style.display = 'block';
                        });

                        document.getElementById('confirm-delete').addEventListener('click', function() {
                            document.getElementById('delete-form').submit();
                        });

                        document.getElementById('cancel-delete').addEventListener('click', function() {
                            document.getElementById('confirmation-popup').style.display = 'none';
                        });
                        </script> --}}

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
<script src="{{ asset('js/detail.js') }}"></script>

    <!-- End Detail Bibit Section -->
@stop
