@extends('layouts.app')

@section('title', 'Detail Permohonan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Permohonan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                <div class="breadcrumb-item">Detail Permohonan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Detail Permohonan</h2>
            <p class="section-lead">
                Berikut adalah detail permohonan yang telah diajukan.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Permohonan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td>{{ $permohonan->nama_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Umur Ayah</th>
                                            <td>{{ $permohonan->umur_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Ayah</th>
                                            <td>{{ $permohonan->pekerjaan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Ayah</th>
                                            <td>{{ $permohonan->pendidikan_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Ayah</th>
                                            <td>{{ $permohonan->alamat_ayah }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td>{{ $permohonan->nama_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Umur Ibu</th>
                                            <td>{{ $permohonan->umur_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Ibu</th>
                                            <td>{{ $permohonan->pekerjaan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Ibu</th>
                                            <td>{{ $permohonan->pendidikan_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Ibu</th>
                                            <td>{{ $permohonan->alamat_ibu }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Calon Suami</th>
                                            <td>{{ $permohonan->nama_calon_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir Calon Suami</th>
                                            <td>{{ $permohonan->tanggal_lahir_calon_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Calon Suami</th>
                                            <td>{{ $permohonan->pekerjaan_calon_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Calon Suami</th>
                                            <td>{{ $permohonan->pendidikan_calon_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Calon Suami</th>
                                            <td>{{ $permohonan->alamat_calon_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Calon Isteri</th>
                                            <td>{{ $permohonan->nama_calon_isteri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir Calon Isteri</th>
                                            <td>{{ $permohonan->tanggal_lahir_calon_isteri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Calon Isteri</th>
                                            <td>{{ $permohonan->pekerjaan_calon_isteri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Calon Isteri</th>
                                            <td>{{ $permohonan->pendidikan_calon_isteri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Calon Isteri</th>
                                            <td>{{ $permohonan->alamat_calon_isteri }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Menikah</th>
                                            <td>{{ $permohonan->tempat_menikah }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Surat Penolakan KUA</th>
                                            <td>{{ $permohonan->no_surat_penolakan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lama Hubungan Calon</th>
                                            <td>{{ $permohonan->lama_hubungan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Penghasilan Perbulan Calon Suami</th>
                                            <td>{{ $permohonan->penghasilan_suami }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Mertua Laki-laki</th>
                                            <td>{{ $permohonan->nama_mertua_laki }}</td>
                                        </tr>
                                        <tr>
                                            <th>Umur Mertua Laki-laki</th>
                                            <td>{{ $permohonan->umur_mertua_laki }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Mertua Laki-laki</th>
                                            <td>{{ $permohonan->pekerjaan_mertua_laki }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Mertua Laki-laki</th>
                                            <td>{{ $permohonan->pendidikan_mertua_laki }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Mertua Laki-laki</th>
                                            <td>{{ $permohonan->alamat_mertua_laki }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Mertua Perempuan</th>
                                            <td>{{ $permohonan->nama_mertua_perempuan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Umur Mertua Perempuan</th>
                                            <td>{{ $permohonan->umur_mertua_perempuan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Mertua Perempuan</th>
                                            <td>{{ $permohonan->pekerjaan_mertua_perempuan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Mertua Perempuan</th>
                                            <td>{{ $permohonan->pendidikan_mertua_perempuan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Mertua Perempuan</th>
                                            <td>{{ $permohonan->alamat_mertua_perempuan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{ route('permohonan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
@endpush
