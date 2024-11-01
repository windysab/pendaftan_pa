@extends('layouts.app')

@section('title', 'Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Permohonan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                <div class="breadcrumb-item">Permohonan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Permohonan</h2>
            <p class="section-lead">
                Silahkan isi data permohonan dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
            </p>
            <form method="POST" action="{{ route('permohonan.store') }}">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Pemohon I (Ayah)</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_ayah"><b>Nama</b></label>
                                    <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur_ayah"><b>Umur</b></label>
                                    <input type="number" id="umur_ayah" name="umur_ayah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ayah"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah"><b>Alamat</b></label>
                                    <textarea id="alamat_ayah" name="alamat_ayah" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Pemohon II (Ibu)</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_ibu"><b>Nama</b></label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur_ibu"><b>Umur</b></label>
                                    <input type="number" id="umur_ibu" name="umur_ibu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ibu"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu"><b>Alamat</b></label>
                                    <textarea id="alamat_ibu" name="alamat_ibu" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Calon Mempelai Suami/Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_calon_suami"><b>Nama</b></label>
                                    <input type="text" id="nama_calon_suami" name="nama_calon_suami" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_calon_suami"><b>Tanggal Lahir</b></label>
                                    <input type="date" id="tanggal_lahir_calon_suami" name="tanggal_lahir_calon_suami" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_calon_suami"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_calon_suami" name="pekerjaan_calon_suami" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_calon_suami"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_calon_suami" name="pendidikan_calon_suami" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_calon_suami"><b>Alamat</b></label>
                                    <textarea id="alamat_calon_suami" name="alamat_calon_suami" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Calon Mempelai Suami/Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_calon_isteri"><b>Nama</b></label>
                                    <input type="text" id="nama_calon_isteri" name="nama_calon_isteri" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_calon_isteri"><b>Tanggal Lahir</b></label>
                                    <input type="date" id="tanggal_lahir_calon_isteri" name="tanggal_lahir_calon_isteri" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_calon_isteri"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_calon_isteri" name="pekerjaan_calon_isteri" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_calon_isteri"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_calon_isteri" name="pendidikan_calon_isteri" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_calon_isteri"><b>Alamat</b></label>
                                    <textarea id="alamat_calon_isteri" name="alamat_calon_isteri" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Calon Suami Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tempat_menikah"><b>Tempat Menikah (ditolak)</b></label>
                                    <input type="text" id="tempat_menikah" name="tempat_menikah" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="no_surat_penolakan"><b>No Surat Penolakan KUA</b></label>
                                    <input type="text" id="no_surat_penolakan" name="no_surat_penolakan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="lama_hubungan"><b>Lama Hubungan Calon</b></label>
                                    <input type="text" id="lama_hubungan" name="lama_hubungan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_suami"><b>Penghasilan Perbulan Calon Suami</b></label>
                                    <input type="number" id="penghasilan_suami" name="penghasilan_suami" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Mertua Laki-laki</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mertua_laki"><b>Nama</b></label>
                                    <input type="text" id="nama_mertua_laki" name="nama_mertua_laki" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur_mertua_laki"><b>Umur</b></label>
                                    <input type="number" id="umur_mertua_laki" name="umur_mertua_laki" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_mertua_laki"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_mertua_laki" name="pekerjaan_mertua_laki" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_mertua_laki"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_mertua_laki" name="pendidikan_mertua_laki" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mertua_laki"><b>Alamat</b></label>
                                    <textarea id="alamat_mertua_laki" name="alamat_mertua_laki" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Mertua Perempuan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mertua_perempuan"><b>Nama</b></label>
                                    <input type="text" id="nama_mertua_perempuan" name="nama_mertua_perempuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="umur_mertua_perempuan"><b>Umur</b></label>
                                    <input type="number" id="umur_mertua_perempuan" name="umur_mertua_perempuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_mertua_perempuan"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_mertua_perempuan" name="pekerjaan_mertua_perempuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_mertua_perempuan"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_mertua_perempuan" name="pendidikan_mertua_perempuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mertua_perempuan"><b>Alamat</b></label>
                                    <textarea id="alamat_mertua_perempuan" name="alamat_mertua_perempuan" class="form-control" data-height="100" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ isset($permohonan) ? 'Update' : 'Submit' }}</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
@endpush
