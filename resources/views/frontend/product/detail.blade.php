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
<section class="detail-bibit section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="single-bibit">
            <div class="image">
              <img src="{{ $benih->foto_benih }}" alt="Logawa Seeds Image">
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          {{-- <h2>Detail Bibit</h2> --}}
          <div class="single-bibit">
            <div class="content">
              <h2>{{ $benih->varietas }}</h2>
              <p class="mrh text-merah">Rp {{ $benih->harga_benih }} /kg</p>
              <p><span class="badge text-bg-warning bg-yellow">{{ $benih->akunProdusen->dataProdusen->nama_perusahaan }}</span></p>
              <h4>Informasi Stok Benih</h4>
              <p class="text-with-underline">Stok: {{ $benih->stok_benih }}</p>
              <p class="text-with-underline">Jenis: {{ $benih->jenis_benih }}</p>
              <p class="text-with-underline">Kelas Benih: {{ $benih->kualitas_benih }}</p>

              
              
              @if (Auth::user()->id != $benih->id_akunp)                  
                <div class="quantity-control">
                  <label for="quantity" class="visually-hidden">Quantity</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-sm btn-secondary" aria-label="Decrease Quantity" onclick="decrementQuantity()">-</button>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" aria-label="Benih Quantity">
                    <span class="input-group-text">/kg</span>
                    <button type="button" class="btn btn-sm btn-primary" aria-label="Increase Quantity" onclick="incrementQuantity()">+</button>
                  </div>
                </div>
                <a href="/padi/checkout/{{ $benih->id_benih }}/1" id="pesan" class="btn btn-success" role="button" aria-disabled="true">Pesan</a>
              @else 
                <div class="mt-3">
                  <a href="{{ route('BenihData.edit', $benih->id_benih) }}" class="btn btn-primary">Edit</a>
                  <a href="#" class="btn btn-danger" id="delete-button">Delete</a>
                  <form id="delete-form" action="{{ route('BenihData.destroy', $benih->id_benih) }}" method="POST" style="display: none;">
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
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
</section>

  <script>
  function incrementQuantity() {
    const quantityInput = document.getElementById('quantity');
    const pesan = document.getElementById('pesan');
    let quantity = parseInt(quantityInput.value);
    quantity = Math.max(quantity + 1, 1); // Ensure minimum quantity of 1
    quantityInput.value = quantity;
    pesan.href = "/padi/checkout/{{ $benih->id_benih }}/"+quantity;
    updateOrderButton();
  }

  function decrementQuantity() {
    const quantityInput = document.getElementById('quantity');
    const pesan = document.getElementById('pesan');
    let quantity = parseInt(quantityInput.value);
    quantity = Math.max(quantity - 1, 1); // Ensure minimum quantity of 1
    quantityInput.value = quantity;
    pesan.href = "/padi/checkout/{{ $benih->id_benih }}/"+quantity;
    updateOrderButton();
  }

  function updateOrderButton() {
    const quantity = document.getElementById('quantity').value;
    const orderButton = document.querySelector('.detail-bibit .content .btn.btn-success');
    orderButton.disabled = quantity === '0'; // Disable button if quantity is 0
  }

  // Call updateOrderButton on page load to handle initial state
  updateOrderButton();
  </script>
<script src="{{ asset('js/detail.js') }}"></script>

<!-- End Detail Bibit Section -->
@endsection
