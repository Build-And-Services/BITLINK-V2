@extends('frontend.layouts.master')
@section('content')
    <div class="container my-5">
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
        <div class="d-flex justify-content-between align-items-center my-4">
            <h5 style="color: #848487;font-size: 1rem;">Data Akun Produsen</h5>
            <a href="{{ route('produsen.create') }}">
                <button class="btn btn-primay font-weight-normal">Tambah
                    Produsen</button>
            </a>
        </div>
        <div class="w-100" style="overflow: auto">
            <table class="table-striped table rounded-lg border">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemilik</th>
                        <th scope="col">Nama perusahaan</th>
                        <th scope="col">Nomor legalitas usaha</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produsenData as $produsen)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $produsen->user->name }}</td>
                            <td>{{ $produsen->nama_perusahaan }}</td>
                            <td>{{ $produsen->nomor_legalitas_usaha }}</td>
                            <td>{{ $produsen->user->alamat_lengkap }}</td>
                            <td>{{ $produsen->user->email }}</td>
                            <td>{{ $produsen->user->telepon }}</td>
                            <td>{{ $produsen->user->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>
@endsection
