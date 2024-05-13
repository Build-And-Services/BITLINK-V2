@extends('frontend.layouts.master')
@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h5 style="color: #848487;font-size: 1rem;">Data Akun Produsen</h5>
        </div>
        <div class="w-100" style="overflow: auto">
            <table class="table-striped table rounded-lg border">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat Lengkap</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Username</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembeli as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->alamat_lengkap }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->telepon }}</td>
                            <td>{{ $item->username }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>
@endsection
