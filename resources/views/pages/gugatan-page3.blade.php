@extends('layouts.app')

@section('title', 'Gugatan - Data Anak')

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
                <h2 class="section-title">Formulir Gugatan - Data Anak</h2>
                <p class="section-lead">
                    Silahkan isi data anak dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.page4') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Anak</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_anak">Nama Anak</label>
                                        <input id="nama_anak" name="nama_anak" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="umur_anak">Umur Anak</label>
                                        <input id="umur_anak" name="umur_anak" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin_anak">Jenis Kelamin Anak</label>
                                        <select id="jenis_kelamin_anak" name="jenis_kelamin_anak" class="form-control" required>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan_anak">Pendidikan Anak</label>
                                        <input id="pendidikan_anak" name="pendidikan_anak" class="form-control" required>
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
