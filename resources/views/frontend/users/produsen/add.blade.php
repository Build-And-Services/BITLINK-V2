@extends('frontend.layouts.master')
@section('content')
    <div class="container my-5">
        @session('error')
            <p class="alert alert-danger">{{ session('error') }}</p>
        @endsession

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{ route('produsen.index') }}">
            <i class="fa-regular fa-circle-left fa-2xl"></i>
        </a>
        <div class="row d-flex justify-content-center">
            <div class="col-xl-9 col-lg-10 col-md-8 col-11 text-center">
                <div class="mb-5 rounded bg-white p-4 shadow">
                    <h5 class="mb-4 text-center">Form Tambah Produsen</h5>
                    <form class="form-card" action="{{ route('produsen.store') }}" method="POST">
                        @csrf
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">
                                    Nama Pemilik<span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="nama">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Nama
                                    Perusahaan<span class="text-danger"> *</span></label> <input class="form-control"
                                    type="text" name="nama_perusahaan"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label">Nomor
                                    Induk Berusaha<span class="text-danger">
                                        *</span></label> <input class="form-control" type="text" name="nomor_legalitas">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label">Alamat<span class="text-danger"> *</span></label>
                                <input class="form-control" type="text" name="alamat">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label">Telepon<span class="text-danger">
                                        *</span></label> <input class="form-control" type="text" name="telephone">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label">Email<span class="text-danger">
                                        *</span></label> <input class="form-control" name="email">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label
                                    class="form-control-label">Password<span class="text-danger"> *</span></label>
                                <input class="form-control" type="password" name="password">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="input-group col-12 input-group d-block flex-column d-flex mb-3"> <label
                                    class="form-control-label">Kemitraan<span class="text-danger">
                                        *</span></label>
                                <select class="form-control w-100" name="id_kemitraan">
                                    <option value="">Pilih Mitra</option>
                                    @foreach ($mitra as $item)
                                        <option value="{{ $item->id_kemitraan }}">{{ $item->nama_mitra }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="form-group col-sm-6"> <button type="submit"
                                    class="btn-block btn btn-primary">Submit</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
