@extends('frontend.layouts.master')
@section('content')
    <link rel="stylesheet" href={{ asset('css/detail.css') }}>
    @foreach ($pesanan as $item)
        <section class="detail-bibit section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="single-bibit">
                            <div class="image">
                                <img src="{{ $item->foto_benih }}" alt="#">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        {{-- <h2>Detail Bibit</h2> --}}
                        <div class="single-bibit">
                            <div class="content">
                                <h2>{{ $item->varietas }}</h2>
                                <p class="mrh text-merah">Rp {{ number_format($item->harga, 0, ',', '.') }} /kg</p>
                                <p>
                                    <span class="badge text-bg-warning bg-yellow">{{ $item->nama_perusahaan }}</span>
                                </p>
                                <h4>Informasi Stok Benih</h4>
                                <p class="text-with-underline">Stok: {{ $item->stok_benih }}</p>
                                <p class="text-with-underline">Jenis: {{ $item->jenis_benih }}</p>
                                <p class="text-with-underline">Kelas Benih: {{ $item->kualitas_benih }}</p>
                            </div>
                            <a href="{{ route('pesanan.invoice', $item->id) }}" style="background-color: #4D4AE7"
                                class="btn btn-primary text-white">Status
                                Pesanan</a>
                            <a href="{{ route('pesanan.riwayat', $item->id) }}" style="background-color: #4D4AE7"
                                class="btn btn-primary text-white">Riwayat
                                Pesanan</a>
                            @if ($item->status_pembayaran == 'BELUM DIBAYAR')
                                <button onclick="bayar({{ $item->id }}, '{{ $item->snap_token }}')"
                                    id="pay-button-{{ $item->id }}" class="btn btn-primary">Bayar
                                    Sekarang</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <script src="{{ asset('js/detail.js') }}"></script>
    <script type="text/javascript">
        function bayar(id, token) {
            var payButton = document.getElementById(`pay-button-${id}`);
            if (!token) {
                alert('token tidak ada')
                return
            }
            window.snap.pay(token, {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        }
    </script>
@endsection
