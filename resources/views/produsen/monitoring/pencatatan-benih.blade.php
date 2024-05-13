@extends('frontend.layouts.master')

@section('content')
<div class="container">
    @if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
    @elseif(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif
</div>
    <div class="">
        <div class="container d-flex justify-content-between mt-3 align-items-center">
            <h6>Riwayat Pencatatan Benih : {{Auth::user()->name}}</h6>
            <div>
                <a class="btn btn-primary" href="{{url('/monitoring')}}">
                    Kembali
                </a>
            </div>
        </div>
        <div class="my-5 d-flex justify-content-center">
            <div class="col-10  ">
                <table class="table align-items-center">
                    <thead class="bg-secondary text-light text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Varietas</th>
                            <th scope="col">Jenis Benih</th>
                            <th scope="col">Stok Benih</th>
                            <th scope="col">Kelas Benih</th>
                            <th scope="col">Harga Benih</th>
                            <th scope="col">Foto Benih</th>
                            <th scope="col">Tanggal Masuk</th>
                            <th scope="col">Foto Benih</th>
                            <th scope="col">Turun Gudang</th>
                            <th scope="col">Jemur Kering</th>
                            <th scope="col">Blower 1</th>
                            <th scope="col">Benih Susut</th>
                            <th scope="col">Biji Kecil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @if ($getRiwayat->isEmpty())
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-primary" role="alert">
                                        Riwayat bulanan belum ada
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($getRiwayat as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->varietas}}</td>
                                <td>{{$item->jenis_benih}}</td>
                                <td>{{$item->stok_benih}}</td>
                                <td>{{$item->kualitas_benih}}</td>
                                <td>@currency($item->harga_benih)</td>
                                <td>
                                    <img src="{{$item->foto_benih}}" style="width: 400px;height:150px" alt="">
                                </td>
                                <td>{{$item->tgl_masuk}}</td>
                                <td>{{$item->turun_gudang}}</td>
                                <td>{{$item->jemur_kering}}</td>
                                <td>{{$item->blower1}}</td>
                                <td>{{$item->benih_susut}}</td>
                                <td>{{$item->biji_kecil}}</td>
                                <td>{{$item->jumlah_benih}}</td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>


        </div>

    </div>

@endsection
