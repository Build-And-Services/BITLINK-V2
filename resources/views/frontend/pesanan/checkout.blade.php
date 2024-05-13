@extends('frontend.layouts.master')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Stok Benih</h2>
                    <ul class="bread-list">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Stok Benih</li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Pesanan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="container py-5">

    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <h5>Barang yang dibeli</h5>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <img src="{{ $benih->foto_benih }}" class="img-thumbnail" alt="Logawa Seeds Image">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-5">
                            <h5>Logawa</h5>
                            <p class="mt-2 text-danger">Rp. {{ number_format($benih->harga_benih, 0, ',', '.') }} /kg</p>
                            <p class="badge badge-warning font-bold">{{ $benih->akunProdusen->dataProdusen->nama_perusahaan }}</p>
                        </div>
                        <div class="col-md-7">
                            <h4>Informasi Benih</h4>
                            <p>Stock: {{ $benih->stok_benih }}</p>
                            <p>Jenis Padi: {{ $benih->jenis_benih }}</p>
                            <p>Kelas Benih: {{ $benih->kualitas_benih }}</p>
                            <p>Quantiy: {{ $pesanan->quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-white">
                    <h6>
                        Ringkasan Belanja
                    </h6>
                </div>
                <div class="card-body">
                    <h6>Total Pesanan</h6>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <p>Total Harga ({{ $pesanan->quantity }} Barang)</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p style="text-align: end">Rp {{ number_format($benih->harga_benih, 0, ',', '.') }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6">
                            <h6>Total Tagihan</h6>
                        </div>
                        <div class="col-md-6 text-end">
                            <h6 style="text-align: end">Rp {{ number_format($pesanan->quantity * $benih->harga_benih, 0, ',', '.') }}</h6>
                        </div>
                    </div>
                    <hr>
                    <div style="display: flex; justify-content: end;">
                        
                            <button class="btn btn-success" id="pay-button">Bayar Sekarang</button>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
      payButton.addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
          onSuccess: function(result){
            /* You may add your own implementation here */
            alert("payment success!"); console.log(result);
          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
  </script>
@endsection