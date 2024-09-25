@extends('layouts.app')

@section('title', 'Gugatan - Data Tergugat')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>GUGAT CERAI</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Formulir Gugatan - Data Tergugat</h2>
                <p class="section-lead">
                    Silahkan isi data tergugat dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.page3') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Tergugat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_tergugat">Nama Tergugat</label>
                                        <input id="nama_tergugat" name="nama_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bin_tergugat">Bin Tergugat</label>
                                        <input id="bin_tergugat" name="bin_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur_tergugat">Umur Tergugat</label>
                                        <input id="umur_tergugat" name="umur_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama_tergugat">Agama Tergugat</label>
                                        <input id="agama_tergugat" name="agama_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_tergugat">Pekerjaan Tergugat</label>
                                        <input id="pekerjaan_tergugat" name="pekerjaan_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan_tergugat">Pendidikan Tergugat</label>
                                        <input id="pendidikan_tergugat" name="pendidikan_tergugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_tergugat">Alamat Tergugat</label>
                                        <textarea id="alamat_tergugat" name="alamat_tergugat" class="form-control" data-height="150" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
