@extends('frontend.layouts.master')
@section('content')
<link rel="stylesheet" href={{asset("css/display.css")}}>
<script src="{{ asset('js/display.js') }}"></script>
		<section class="display-bibit section">
			<div class="container">
				<div class="row">
					@foreach($benihData as $benih)
					@if($benih->jenis_benih == 'Kedelai')
						<div class="col-lg-4 col-md-6 col-12">
							<div class="single-bibit">
								<a href="{{ route('BenihData.detail', $benih->id_benih) }}">
									<div class="image">
										<img src="{{ asset('img/'.$benih->foto_benih) }}" alt="#">
									</div>
									<div class="content">
										<h4>{{ $benih->varietas }}</h4>
										<p>Harga: Rp {{ $benih->harga_benih }}</p>
										{{-- <p>Jenis: {{ $benih->jenis_benih }}</p>
										<p>Kualitas: {{ $benih->kualitas_benih }}</p> --}}
										<p>Stok: {{ $benih->stok_benih }}</p>
									</div>
								</a>
							</div>
						</div>
					@endif
				@endforeach
				</div>
			</div>
		</section>
		<!-- End Display Bibit Section -->

@stop
