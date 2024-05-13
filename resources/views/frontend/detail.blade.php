@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href={{asset("css/detail.css")}}>
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
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
     <!-- Detail Bibit -->
    <section class="detail-bibit section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="single-bibit">
                        <div class="image">
                            <img src="{{ asset($benihData->foto_benih) }}" alt="#">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    {{-- <h2>Detail Bibit</h2> --}}
                    <div class="single-bibit">
                        <div class="content">
                            <h2>{{ $benihData->varietas }}</h2>
                            <p class="mrh text-merah">Rp {{ $benihData->harga_benih }} /kg</p>
                            <p><span class="badge text-bg-warning bg-yellow">{{ $benihData->akunProdusen->nama_perusahaan }}</span></p>
                            <h4>Informasi Stok Benih</h4>
                            <p class="text-with-underline">Stok: {{ $benihData->stok_benih }}</p>
                            <p class="text-with-underline">Jenis: {{ $benihData->jenis_benih }}</p>
                            <p class="text-with-underline">Kelas Benih: {{ $benihData->kualitas_benih }}</p>
                        </div>
                        <a href="{{ route('BenihData.edit', $benihData->id_benih) }}" class="btn btn-primary">Edit</a>
                        <a href="#" class="btn btn-danger" id="delete-button">Delete</a>
                        <form id="delete-form" action="{{ route('BenihData.destroy', $benihData->id_benih) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                        <!-- Pop-up konfirmasi -->
                        <div class="confirmation-popup" id="confirmation-popup">
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
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="{{ asset('js/detail.js') }}"></script>

    <!-- End Detail Bibit Section -->
@stop
