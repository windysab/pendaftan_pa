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
            <h2 class="section-title">Formulir Gugatan - Data Perselisihan dan Pertengkaran</h2>
            <p class="section-lead">
                Silahkan isi data anak dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
            </p>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('gugatan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Detail Perselisihan dan Pertengkaran</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_perselisihan"><b>Tanggal Perselisihan</b></label>
                                            <input type="date" id="tanggal_perselisihan" name="tanggal_perselisihan" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alasan_perselisihan"><b>Alasan Perselisihan dan
                                                    Pertengkaran</b></label>
                                            <select class="form-control" name="alasan_perselisihan" id="alasan_perselisihan" onchange="showTextarea()">
                                                <option value="minum_keras">Mengkonsumsi minum-minuman keras</option>
                                                <option value="bermain_judi">Bermain judi</option>
                                                <option value="memukul_penggugat">Memukul Penggugat</option>
                                                <option value="hubungan_asmara">Telah menjalin hubungan asmara dengan
                                                    perempuan lain</option>
                                                <option value="keluar_malam">Sering keluar pada malam hari / pulang pada
                                                    waktu dini hari / tidak pulang berhari – hari</option>
                                                <option value="malas_bekerja">Malas berkerja</option>
                                                <option value="tidak_biaya">Tidak memberi biaya untuk keperluan rumah
                                                    tangga sehingga tidak mencukupi</option>
                                                <option value="dijodohkan">Perkawinan Penggugat dan Tergugat dijodohkan
                                                    oleh orang tua masing-masing</option>
                                                <option value="alasan_lainnya">Alasan lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="textarea-container" style="display:none;">
                                    <textarea name="detail_alasan" class="form-control" data-height="100" placeholder="Jelaskan kejadiannya"></textarea>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Upaya Merukunkan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>Upaya Merukunkan Penggugat dan Tergugat</b></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="upaya_merukunkan" id="ada_upaya" value="ada" required>
                                            <label class="form-check-label" for="ada_upaya"><b>Ada</b></label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="upaya_merukunkan" id="tidak_ada_upaya" value="tidak_ada" required>
                                            <label class="form-check-label" for="tidak_ada_upaya"><b>Sudah tidak
                                                    ada</b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Detail Perpisahan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tanggal_perpisahan"><b>Tanggal Perpisahan</b></label>
                                    <input type="date" id="tanggal_perpisahan" name="tanggal_perpisahan" class="form-control" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Jenis Perpisahan</b></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_perpisahan" id="berpisah_tempat_tinggal" value="Berpisah tempat tinggal" required>
                                                <label class="form-check-label" for="berpisah_tempat_tinggal"><b>Berpisah
                                                        tempat tinggal</b></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_perpisahan" id="berpisah_tempat_tidur" value="Berpisah tempat tidur" required>
                                                <label class="form-check-label" for="berpisah_tempat_tidur"><b>Berpisah
                                                        tempat tidur</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Siapa yang meninggalkan rumah</b></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="siapa_meninggalkan" id="tergugat" value="Tergugat" required>
                                                <label class="form-check-label" for="tergugat"><b>Tergugat</b></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="siapa_meninggalkan" id="penggugat" value="Penggugat" required>
                                                <label class="form-check-label" for="penggugat"><b>Penggugat</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desa"><b>Desa</b></label>
                                            <input type="text" id="desa_meninggalkan" name="desa_meninggalkan" class="form-control" placeholder="Nama desa" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Alasan meninggalkan rumah</b></label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="karena_diusir_penggugat" value="karena diusir oleh Penggugat" required>
                                                <label class="form-check-label" for="karena_diusir_penggugat"><b>Karena diusir Penggugat</b></label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="karena_diusir_tergugat" value="karena diusir oleh Tergugat" required>
                                                <label class="form-check-label" for="karena_diusir_tergugat"><b>Karena diusir Tergugat</b></label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="keinginan_penggugat_sendiri" value="karena keinginan Penggugat sendiri" required>
                                                <label class="form-check-label" for="keinginan_penggugat_sendiri"><b>Karena keinginan Penggugat sendiri</b></label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="keinginan_tergugat_sendiri" value="karena keinginan Tergugat sendiri" required>
                                                <label class="form-check-label" for="keinginan_tergugat_sendiri"><b>Karena keinginan Tergugat sendiri</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->

<!-- Page Specific JS File -->
@endpush
