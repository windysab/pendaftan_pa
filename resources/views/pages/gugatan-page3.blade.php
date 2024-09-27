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

                <form method="POST" action="{{ route('gugatan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Detail Perselisihan dan Pertengkaran</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="tanggal_perselisihan">Tanggal Perselisihan</label>
                                        <input type="date" id="tanggal_perselisihan" name="tanggal_perselisihan"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alasan Perselisihan dan Pertengkaran</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="minum_keras" value="minum_keras">
                                            <label class="form-check-label" for="minum_keras">
                                                Mengkonsumsi minum-minuman keras
                                                <textarea name="detail_minum_keras" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="bermain_judi" value="bermain_judi">
                                            <label class="form-check-label" for="bermain_judi">
                                                Bermain judi
                                                <textarea name="detail_bermain_judi" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="memukul_penggugat" value="memukul_penggugat">
                                            <label class="form-check-label" for="memukul_penggugat">
                                                Memukul Penggugat
                                                <textarea name="detail_memukul_penggugat" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="hubungan_asmara" value="hubungan_asmara">
                                            <label class="form-check-label" for="hubungan_asmara">
                                                Telah menjalin hubungan asmara dengan perempuan lain
                                                <textarea name="detail_hubungan_asmara" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="keluar_malam" value="keluar_malam">
                                            <label class="form-check-label" for="keluar_malam">
                                                Sering keluar pada malam hari / pulang pada waktu dini hari / tidak
                                                pulang berhari – hari
                                                <textarea name="detail_keluar_malam" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="malas_bekerja" value="malas_bekerja">
                                            <label class="form-check-label" for="malas_bekerja">
                                                Malas berkerja
                                                <textarea name="detail_malas_bekerja" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="tidak_biaya" value="tidak_biaya">
                                            <label class="form-check-label" for="tidak_biaya">
                                                Tidak memberi biaya untuk keperluan rumah tangga sehingga tidak
                                                mencukupi
                                                <textarea name="detail_tidak_biaya" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="dijodohkan" value="dijodohkan">
                                            <label class="form-check-label" for="dijodohkan">
                                                Perkawinan Penggugat dan Tergugat dijodohkan oleh orang tua
                                                masing-masing
                                                <textarea name="detail_dijodohkan" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="alasan_perselisihan[]"
                                                id="alasan_lainnya" value="alasan_lainnya">
                                            <label class="form-check-label" for="alasan_lainnya">
                                                Alasan lainnya
                                                <textarea name="detail_alasan_lainnya" class="form-control"
                                                    placeholder="Jelaskan kejadiannya"></textarea>
                                            </label>
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
                                        <label for="tanggal_perpisahan">Tanggal Perpisahan</label>
                                        <input type="date" id="tanggal_perpisahan" name="tanggal_perpisahan"
                                            class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Perpisahan</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_perpisahan"
                                                id="berpisah_tempat_tinggal" value="berpisah_tempat_tinggal" required>
                                            <label class="form-check-label" for="berpisah_tempat_tinggal">Berpisah
                                                tempat tinggal</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_perpisahan"
                                                id="berpisah_tempat_tidur" value="berpisah_tempat_tidur" required>
                                            <label class="form-check-label" for="berpisah_tempat_tidur">Berpisah
                                                tempat tidur</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Siapa yang meninggalkan rumah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="siapa_meninggalkan"
                                                id="tergugat" value="tergugat" required>
                                            <label class="form-check-label" for="tergugat">Tergugat</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="siapa_meninggalkan"
                                                id="penggugat" value="penggugat" required>
                                            <label class="form-check-label" for="penggugat">Penggugat</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="desa">Desa</label>
                                        <input type="text" id="desa" name="desa" class="form-control"
                                            placeholder="Nama desa" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alasan meninggalkan rumah</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="alasan_meninggalkan"
                                                id="diusir" value="diusir" required>
                                            <label class="form-check-label" for="diusir">Karena diusir oleh</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="alasan_meninggalkan"
                                                id="keinginan_sendiri" value="keinginan_sendiri" required>
                                            <label class="form-check-label" for="keinginan_sendiri">Keinginan
                                                sendiri</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Upaya Merukunkan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Upaya Merukunkan Penggugat dan Tergugat</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="upaya_merukunkan"
                                                id="ada_upaya" value="ada" required>
                                            <label class="form-check-label" for="ada_upaya">Ada</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="upaya_merukunkan"
                                                id="tidak_ada_upaya" value="tidak_ada" required>
                                            <label class="form-check-label" for="tidak_ada_upaya">Sudah tidak
                                                ada</label>
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
