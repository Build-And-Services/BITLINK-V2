@extends('frontend.layouts.master')

@section('content')
<div class="">
    <div class="my-5 d-flex justify-content-center">
        <div class="col-9 ">
            <table class="table align-items-center">
                <thead class="bg-secondary text-light  text-center">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Evaluasi</th>
                        <th scope="col">Nama Perusahaan</th>
                        <th scope="col">Kinerja Produksi</th>
                        <th scope="col">Kualitas Benih</th>
                        <th scope="col">Kendala Produksi</th>
                        <th scope="col">Saran Perbaikan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @if ($laporan->isEmpty())
                        <tr>
                            <td colspan="9">
                                <div class="alert alert-primary" role="alert">
                                    Laporan bulanan belum ada
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($laporan as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->tgl_evaluasi}}</td>
                            <td>{{$item->akunProdusen->nama_perusahaan}}</td>
                            <td>{{$item->kinerja_produksi}}</td>
                            <td>{{$item->kualitas_benih}}</td>
                            <td>{{$item->kendala_produksi}}</td>
                            <td>{{$item->saran_produksi}}</td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>


    </div>

</div>
@endsection
