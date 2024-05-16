@extends('frontend.layouts.master')

@section('content')
<div class="">
    <div class="container d-flex justify-content-between mt-3 align-items-center">
            <div class="d-flex align-items-center">
                <div>
                    @if (Auth::user()->role == 'AKUN DINAS')
                        <a class="btn btn-primary mr-2" href="{{url('/monitoring-dinas/laporan-bulanan/dinas')}}">
                            Laporan Kinerja
                        </a>
                    @else
                        <a class="btn btn-primary mr-2" href="{{url('/monitoring')}}">
                            Kembali
                        </a>
                    @endif
                </div>
                <h6>Edukasi</h6>
            </div>
            <div>
                @if (Auth::user()->role == 'AKUN DINAS')
                    <a class="btn btn-primary" href="{{url('/monitoring-edukasi/create')}}">
                        Tambah Data
                    </a>
                @endif
            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger container mt-4" role="alert">
            {{session('error')}}
        </div>
        @elseif(session('success'))
        <div class="alert alert-success container mt-4" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="my-5 d-flex justify-content-center">
            <div class="row col-9">

                @if ($getEdukasi->isEmpty())
                <div class="alert alert-primary container" role="alert">
                    Edukasi belum ada, silahkan tambahkan edukasi
                </div>
                @else
                    @foreach ($getEdukasi as $item)
                    <div class="col-12 mt-3">
                        <div class="card text-light" style="background-color: #01B2B7">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <div class="mt-3">
                                    <span>Edukasi</span>
                                    <h4>{{$item->judul_edukasi}}</h4>
                                    <h6>{{$item->tanggal_edukasi}}</h6>
                                    <p class="text-light">{{Str::limit($item->isi_edukasi, 50, '...')}}</p>
                                    <a>Ditambahkan oleh : {{$item->nama_produsen}} {{$item->nama_dinas}}</i></a>
                                </div>
                                <div class="mt-3">
                                    <a class="btn-warning px-3 py-2 rounded mr-2" href="{{url('/monitoring-edukasi/show', $item->id_edukasi)}}">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>


        </div>

    </div>

@endsection
