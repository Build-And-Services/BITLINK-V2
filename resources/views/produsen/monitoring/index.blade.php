@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <section class="container my-5">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Kinerja</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <a href="{{ url('/monitoring/laporan-bulanan') }}" class="d-flex justify-content-center mt-4">
                            <button class="btn btn-primary">
                                Lihat Laporan Kinerja
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Pencatatan</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <a href="{{ url('/monitoring/riwayat-pencatatan') }}" class="d-flex justify-content-center mt-4">
                            <button class="btn btn-primary">
                                Lihat Riwayat Pencatatan
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edukasi</h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <a href="{{ url('/monitoring/edukasi/produsen') }}" class="d-flex justify-content-center mt-4">
                            <button class="btn btn-primary">
                                Lihat Edukasi
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
