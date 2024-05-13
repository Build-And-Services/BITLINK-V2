@extends('frontend.layouts.master')

@push('stylesheet')
@endpush
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>{{ Auth::user()->name }}</h2>
                    <ul class="bread-list">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="section">
    <div class="container">
        <div class="row mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><g fill="none" fill-rule="evenodd" stroke="#999" stroke-linecap="round" stroke-linejoin="round"><path d="M13.494 15.28l-12.181.003v-1.787c0-.724.145-1.376.43-1.935a3.603 3.603 0 0 1 1.24-1.383 6.503 6.503 0 0 1 1.723-.795 8.735 8.735 0 0 1 1.235-.272"/><path d="M8.897 9.12c.413.067.803.154 1.165.263.64.193 1.22.46 1.725.795.533.353.95.818 1.237 1.383.286.56.431 1.211.431 1.935v1.787M4.608 7.338c-.562-1.018-.847-2.075-.847-3.146 0-.951.313-1.646.958-2.124.675-.502 1.571-.755 2.664-.755 1.093 0 1.989.253 2.664.755.645.478.958 1.173.958 2.124 0 1.104-.278 2.182-.827 3.207-.497.927-1.1 1.565-1.79 1.907a2.855 2.855 0 0 1-.987.164c-.378 0-.67-.062-.87-.124-.726-.34-1.374-1.016-1.923-2.008z"/></g></svg>
                            <h4 class="ml-2" style="font-size: 16px; font-weight: 600;">
                                {{ Auth::user()->name }}
                            </h4>
                        </div>
                    </div>
                    <div class="card-body row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Biodata diri</h5>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                                                
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="post" id="form-edit">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name" class="col-form-label">nama</label>
                                                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" id="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name_perusahaaan" class="col-form-label">nama perusahaaan</label>
                                                        <input type="text" name="name_perusahaaan" value="{{ Auth::user()->dataProdusen->nama_perusahaan }}" class="form-control" id="name_perusahaaan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomor_legalitas_usaha" class="col-form-label">nomor legalitas usahah</label>
                                                        <input type="text" name="nomor_legalitas_usaha" value="{{ Auth::user()->dataProdusen->nomor_legalitas_usaha }}" class="form-control" id="nomor_legalitas_usaha">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat_lengkap" class="col-form-label">alamat lengkap</label>
                                                        <input type="text" name="alamat_lengkap" value="{{ Auth::user()->dataProdusen->alamat_lengkap }}" class="form-control" id="alamat_lengkap">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="telepone" class="col-form-label">telephone</label>
                                                        <input type="text" name="telepone" value="{{ Auth::user()->dataProdusen->telepon }}" class="form-control" id="telepone">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label">email</label>
                                                        <input type="email" name="email" value="{{ Auth::user()->email   }}" class="form-control" id="email">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email" class="col-form-label">password</label>
                                                        <input type="password" name="password" class="form-control" id="email">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <button type="button" id="simpan-form" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="mb-2 col-3">
                                    <h6>Nama</h6>
                                </div>
                                <div class="mb-2 col-9">
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                                @isset(Auth::user()->dataProdusen)                          
                                    <div class="mb-2 col-3">
                                        <h6>Nama Perusahaan</h6>
                                    </div>
                                    <div class="mb-2 col-9">
                                        <p>{{ Auth::user()->dataProdusen->nama_perusahaan }}</p>
                                    </div>
                                    <div class="mb-2 col-3">
                                        <h6>No. Legalitas</h6>
                                    </div>
                                    <div class="mb-2 col-9">
                                        <p>{{ Auth::user()->dataProdusen->nomor_legalitas_usaha }}</p>
                                    </div>
                                    <div class="mb-2 col-3">
                                        <h6>Alamat Lengkap</h6>
                                    </div>
                                    <div class="mb-2 col-9">
                                        <p>{{ Auth::user()->dataProdusen->alamat_lengkap }}</p>
                                    </div>
                                    <div class="mb-2 col-3">
                                        <h6>Telephone</h6>
                                    </div>
                                    <div class="mb-2 col-9">
                                        <p>{{ Auth::user()->dataProdusen->telepon }}</p>
                                    </div>
                                @endisset
                                <div class="mb-2 col-3">
                                    <h6>Email</h6>
                                </div>
                                <div class="mb-2 col-9">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                                <div class="mb-2 col-3">
                                    <h6>Username</h6>
                                </div>
                                <div class="mb-2 col-9">
                                    <p>{{ Auth::user()->username }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        var buttonSubmit = document.getElementById('simpan-form');
        if(buttonSubmit){
            buttonSubmit.addEventListener('click', () => {
                var formEdit = document.getElementById('form-edit');
                if(formEdit){
                    formEdit.submit();
                }
            })
        }
    </script>
@endpush