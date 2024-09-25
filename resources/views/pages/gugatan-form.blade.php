@extends('layouts.app')

@section('title', 'Gugatan - Data Penggugat')

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
                <h2 class="section-title">Formulir Gugatan - Data Penggugat</h2>
                <p class="section-lead">
                    Silahkan isi data penggugat dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.page2') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Penggugat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_penggugat">Nama Penggugat</label>
                                        <input id="nama_penggugat" name="nama_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="binti_penggugat">Binti Penggugat</label>
                                        <input id="binti_penggugat" name="binti_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur_penggugat">Umur Penggugat</label>
                                        <input id="umur_penggugat" name="umur_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama_penggugat">Agama Penggugat</label>
                                        <input id="agama_penggugat" name="agama_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan_penggugat">Pekerjaan Penggugat</label>
                                        <input id="pekerjaan_penggugat" name="pekerjaan_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan_penggugat">Pendidikan Penggugat</label>
                                        <input id="pendidikan_penggugat" name="pendidikan_penggugat" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_penggugat">Alamat Penggugat</label>
                                        <textarea id="alamat_penggugat" name="alamat_penggugat" class="form-control" data-height="150" required></textarea>
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
