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
            <div class="d-flex align-items-center">
                <div>
                    <a class="btn btn-primary mr-2" href="{{url('/monitoring')}}">
                        Kembali
                    </a>
                </div>
                <h6>Monitoring Laporan Bulanan</h6>
            </div>
            <div>
                <a class="btn btn-primary" href="{{url('/monitoring/laporan-bulanan/create')}}">
                    Tambah Data
                </a>
            </div>
        </div>
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
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @if ($getLaporan->isEmpty())
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-primary" role="alert">
                                        Laporan bulanan belum ada, silahkan tambahkan laporan
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($getLaporan as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->tgl_evaluasi}}</td>
                                <td>{{Auth::user()->dataProdusen->nama_perusahaan}}</td>
                                <td>{{$item->kinerja_produksi}}</td>
                                <td>{{$item->kualitas_benih}}</td>
                                <td>{{$item->kendala_produksi}}</td>
                                <td>{{$item->saran_produksi}}</td>
                                {{-- <td>
                                    <div class="d-flex">
                                        <a href="{{route('produsen.laporan.detail', ['id' => $item->id_evaluasi])}}">
                                            <button class="py-2 px-4 mr-2 btn-warning">Edit</button>
                                        </a>
                                        <form id="deleteForm{{$item->id_evaluasi}}" action="{{route('produsen.laporan.destroy', ['id' => $item->id_evaluasi])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <button type="button" onclick="deleteEvaluasi('{{$item->id_evaluasi}}')" class="py-2 px-4 mr-2 btn-danger">Hapus</button>
                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>


        </div>

    </div>
    <!--/ End Slider Area -->

    <!-- Start Schedule Area -->
    <!-- jquery Min JS -->
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function deleteEvaluasi(id) {
            Swal.fire({
                title: "Apakah anda yakin?",
                icon: "question",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if(result.isConfirmed) {
                    document.getElementById('deleteForm' + id).submit();
                }
            })
        }
    </script>
@endsection
