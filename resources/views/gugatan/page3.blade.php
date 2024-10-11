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
            {{-- <form method="POST" action="{{ isset($gugatan) ? route('gugatan.update', $gugatan->id) : route('gugatan.store2') }}"> --}}

            <form method="POST" action="{{ route('gugatan.page3.post') }}">
                @csrf
                {{-- @if(isset($gugatan))
                    @method('PUT')
                @endif --}}
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
                                            <input type="date" id="tanggal_perselisihan" name="tanggal_perselisihan" class="form-control" value="{{ old('tanggal_perselisihan', $gugatan->tanggal_perselisihan ?? '') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="alasan_perselisihan"><b>Alasan Perselisihan dan Pertengkaran</b></label>
                                            <select class="form-control" name="alasan_perselisihan" id="alasan_perselisihan" onchange="showTextarea()">
                                                <option value="minum_keras" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'minum_keras' ? 'selected' : '' }}>Mengkonsumsi minum-minuman keras</option>
                                                <option value="bermain_judi" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'bermain_judi' ? 'selected' : '' }}>Bermain judi</option>
                                                <option value="memukul_penggugat" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'memukul_penggugat' ? 'selected' : '' }}>Memukul Penggugat</option>
                                                <option value="hubungan_asmara" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'hubungan_asmara' ? 'selected' : '' }}>Telah menjalin hubungan asmara dengan perempuan lain</option>
                                                <option value="keluar_malam" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'keluar_malam' ? 'selected' : '' }}>Sering keluar pada malam hari / pulang pada waktu dini hari / tidak pulang berhari – hari</option>
                                                <option value="malas_bekerja" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'malas_bekerja' ? 'selected' : '' }}>Malas berkerja</option>
                                                <option value="tidak_biaya" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'tidak_biaya' ? 'selected' : '' }}>Tidak memberi biaya untuk keperluan rumah tangga sehingga tidak mencukupi</option>
                                                <option value="dijodohkan" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'dijodohkan' ? 'selected' : '' }}>Perkawinan Penggugat dan Tergugat dijodohkan oleh orang tua masing-masing</option>
                                                <option value="alasan_lainnya" {{ old('alasan_perselisihan', $gugatan->alasan_perselisihan ?? '') == 'alasan_lainnya' ? 'selected' : '' }}>Alasan lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="textarea-container" style="display:none;">
                                    <textarea name="detail_alasan" class="form-control" data-height="100" placeholder="Jelaskan kejadiannya">{{ old('detail_alasan', $gugatan->detail_alasan ?? '') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label><b>Upaya Merukunkan Penggugat dan Tergugat</b></label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="upaya_merukunkan" id="ada_upaya" value="ada" {{ old('upaya_merukunkan', $gugatan->upaya_merukunkan ?? '') == 'ada' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="ada_upaya"><b>Ada</b></label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="upaya_merukunkan" id="tidak_ada_upaya" value="tidak_ada" {{ old('upaya_merukunkan', $gugatan->upaya_merukunkan ?? '') == 'tidak_ada' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="tidak_ada_upaya"><b>Sudah tidak ada</b></label>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_perpisahan"><b>Tanggal Perpisahan</b></label>
                                            <input type="date" id="tanggal_perpisahan" name="tanggal_perpisahan" class="form-control" value="{{ old('tanggal_perpisahan', $gugatan->tanggal_perpisahan ?? '') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Jenis Perpisahan</b></label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_perpisahan" id="berpisah_tempat_tinggal" value="Berpisah tempat tinggal" {{ old('jenis_perpisahan', $gugatan->jenis_perpisahan ?? '') == 'Berpisah tempat tinggal' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="berpisah_tempat_tinggal"><b>Berpisah tempat tinggal</b></label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_perpisahan" id="berpisah_tempat_tidur" value="Berpisah tempat tidur" {{ old('jenis_perpisahan', $gugatan->jenis_perpisahan ?? '') == 'Berpisah tempat tidur' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="berpisah_tempat_tidur"><b>Berpisah tempat tidur</b></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Siapa yang meninggalkan rumah</b></label>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="siapa_meninggalkan" id="tergugat" value="Tergugat" {{ old('siapa_meninggalkan', $gugatan->siapa_meninggalkan ?? '') == 'Tergugat' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="tergugat"><b>Tergugat</b></label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="siapa_meninggalkan" id="penggugat" value="Penggugat" {{ old('siapa_meninggalkan', $gugatan->siapa_meninggalkan ?? '') == 'Penggugat' ? 'checked' : '' }} required>
                                                <label class="form-check-label" for="penggugat"><b>Penggugat</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="desa"><b>Desa</b></label>
                                            <input type="text" id="desa_meninggalkan" name="desa_meninggalkan" class="form-control" placeholder="Nama desa" value="{{ old('desa_meninggalkan', $gugatan->desa_meninggalkan ?? '') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><b>Alasan meninggalkan rumah</b></label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="karena_diusir_penggugat" value="karena diusir oleh Penggugat" {{ old('alasan_meninggalkan', $gugatan->alasan_meninggalkan ?? '') == 'karena diusir oleh Penggugat' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="karena_diusir_penggugat"><b>Karena diusir Penggugat</b></label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="karena_diusir_tergugat" value="karena diusir oleh Tergugat" {{ old('alasan_meninggalkan', $gugatan->alasan_meninggalkan ?? '') == 'karena diusir oleh Tergugat' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="karena_diusir_tergugat"><b>Karena diusir Tergugat</b></label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="keinginan_penggugat_sendiri" value="karena keinginan Penggugat sendiri" {{ old('alasan_meninggalkan', $gugatan->alasan_meninggalkan ?? '') == 'karena keinginan Penggugat sendiri' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="keinginan_penggugat_sendiri"><b>Karena keinginan Penggugat sendiri</b></label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="alasan_meninggalkan" id="keinginan_tergugat_sendiri" value="karena keinginan Tergugat sendiri" {{ old('alasan_meninggalkan', $gugatan->alasan_meninggalkan ?? '') == 'karena keinginan Tergugat sendiri' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="keinginan_tergugat_sendiri"><b>Karena keinginan Tergugat sendiri</b></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">{{ isset($gugatan) ? 'Update' : 'Submit' }}</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->

<!-- Page Specific JS File -->
@endpush
