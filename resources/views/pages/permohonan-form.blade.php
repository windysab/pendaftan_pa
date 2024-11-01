@extends('layouts.app')

@section('title', 'Gugatan')

@push('style')
<!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content" id="app">
    <section class="section">
        <div class="section-header">
            <h1>GUGAT CERAI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                <div class="breadcrumb-item">Permohonan Dispensasi Kawin</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Permohonan Dispensasi Kawin</h2>
            <p class="section-lead">
                Silahkan isi data pemohon dibawah ini. Pastikan data yang anda masukkan benar. Terima
                kasih.
            </p>

            <form method="POST" action="{{ isset($permohonan) ? route('permohonan.update', $permohonan->id) : route('permohonan.store') }}" onsubmit="validateForm(event)" id="permohonanForm">
                @csrf
                @if(isset($permohonan))
                @method('PUT')
                @endif

                <!-- Data Pemohon I (Ayah) -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Pemohon I (Ayah)</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_ayah"><b>Nama</b></label>
                                    <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $permohonan->nama_ayah ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="umur_ayah"><b>Umur</b></label>
                                    <input type="number" id="umur_ayah" name="umur_ayah" class="form-control" value="{{ old('umur_ayah', $permohonan->umur_ayah ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ayah"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" value="{{ old('pekerjaan_ayah', $permohonan->pekerjaan_ayah ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ayah"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_ayah" name="pendidikan_ayah" class="form-control" value="{{ old('pendidikan_ayah', $permohonan->pendidikan_ayah ?? '') }}">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ayah"><b>Alamat</b></label>
                                    <textarea id="alamat_ayah" name="alamat_ayah" class="form-control" data-height="100">{{ old('alamat_ayah', $permohonan->alamat_ayah ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Pemohon II (Ibu) -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Pemohon II (Ibu)</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_ibu"><b>Nama</b></label>
                                    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="umur_ibu"><b>Umur</b></label>
                                    <input type="number" id="umur_ibu" name="umur_ibu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_ibu"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_ibu"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_ibu" name="pendidikan_ibu" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_ibu"><b>Alamat</b></label>
                                    <textarea id="alamat_ibu" name="alamat_ibu" class="form-control" data-height="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data calon Mempelai Suami/Isteri -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data calon Mempelai Suami/Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_calon_suami"><b>Nama</b></label>
                                    <input type="text" id="nama_calon_suami" name="nama_calon_suami" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_calon_suami"><b>Tanggal Lahir</b></label>
                                    <input type="date" id="tanggal_lahir_calon_suami" name="tanggal_lahir_calon_suami" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_calon_suami"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_calon_suami" name="pekerjaan_calon_suami" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_calon_suami"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_calon_suami" name="pendidikan_calon_suami" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_calon_suami"><b>Alamat</b></label>
                                    <textarea id="alamat_calon_suami" name="alamat_calon_suami" class="form-control" data-height="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data calon Mempelai Suami/Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_calon_isteri"><b>Nama</b></label>
                                    <input type="text" id="nama_calon_isteri" name="nama_calon_isteri" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir_calon_isteri"><b>Tanggal Lahir</b></label>
                                    <input type="date" id="tanggal_lahir_calon_isteri" name="tanggal_lahir_calon_isteri" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_calon_isteri"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_calon_isteri" name="pekerjaan_calon_isteri" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_calon_isteri"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_calon_isteri" name="pendidikan_calon_isteri" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_calon_isteri"><b>Alamat</b></label>
                                    <textarea id="alamat_calon_isteri" name="alamat_calon_isteri" class="form-control" data-height="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Calon Suami Isteri -->
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Calon Suami Isteri</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tempat_menikah"><b>Tempat menikah (ditolak)</b></label>
                                    <input type="text" id="tempat_menikah" name="tempat_menikah" class="form-control" placeholder="Kecamatan ................................ Kabupaten Hulu Sungai Utara/">
                                </div>
                                <div class="form-group">
                                    <label for="no_surat_penolakan"><b>No Surat Penolakan KUA</b></label>
                                    <input type="text" id="no_surat_penolakan" name="no_surat_penolakan" class="form-control" placeholder="Surat Keterangan dari ...................... Nomor .................................................. Tanggal ...................">
                                </div>
                                <div class="form-group">
                                    <label for="lama_hubungan"><b>Lama hubungan calon</b></label>
                                    <input type="text" id="lama_hubungan" name="lama_hubungan" class="form-control" placeholder="................tahun............... bulan">
                                </div>
                                <div class="form-group">
                                    <label for="penghasilan_suami"><b>Penghasilan perbulan calon suami</b></label>
                                    <input type="number" id="penghasilan_suami" name="penghasilan_suami" class="form-control" placeholder="Rp.">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Mertua Laki-laki -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Mertua Laki-laki</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mertua_laki"><b>Nama</b></label>
                                    <input type="text" id="nama_mertua_laki" name="nama_mertua_laki" class="form-control" placeholder="Nama bin">
                                </div>
                                <div class="form-group">
                                    <label for="umur_mertua_laki"><b>Umur</b></label>
                                    <input type="number" id="umur_mertua_laki" name="umur_mertua_laki" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_mertua_laki"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_mertua_laki" name="pekerjaan_mertua_laki" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_mertua_laki"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_mertua_laki" name="pendidikan_mertua_laki" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mertua_laki"><b>Alamat</b></label>
                                    <textarea id="alamat_mertua_laki" name="alamat_mertua_laki" class="form-control" data-height="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Mertua Perempuan -->
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Data Mertua Perempuan</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_mertua_perempuan"><b>Nama</b></label>
                                    <input type="text" id="nama_mertua_perempuan" name="nama_mertua_perempuan" class="form-control" placeholder="Nama binti">
                                </div>
                                <div class="form-group">
                                    <label for="umur_mertua_perempuan"><b>Umur</b></label>
                                    <input type="number" id="umur_mertua_perempuan" name="umur_mertua_perempuan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan_mertua_perempuan"><b>Pekerjaan</b></label>
                                    <input type="text" id="pekerjaan_mertua_perempuan" name="pekerjaan_mertua_perempuan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan_mertua_perempuan"><b>Pendidikan</b></label>
                                    <input type="text" id="pendidikan_mertua_perempuan" name="pendidikan_mertua_perempuan" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_mertua_perempuan"><b>Alamat</b></label>
                                    <textarea id="alamat_mertua_perempuan" name="alamat_mertua_perempuan" class="form-control" data-height="100"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-right">{{ isset($permohonan) ? 'Update' : 'Submit' }}</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<!-- JS Libraries -->
<script src="{{ asset('js/scripts.js') }}"></script>

<script>
    $(document).ready(function() {
        $('#kabupaten_penggugat').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) {
                $.get('/api/kabupaten/search', {
                    query: query
                }, function(data) {
                    $('#kabupaten_penggugat_suggestions').empty();
                    data.forEach(function(kabupaten) {
                        $('#kabupaten_penggugat_suggestions').append(`<a href="#" class="list-group-item list-group-item-action kabupaten-suggestion" data-id="${kabupaten.id}" data-name="${kabupaten.name}">${kabupaten.name}</a>`);
                    });
                }).fail(function() {
                    // Handle error
                });
            } else {
                $('#kabupaten_penggugat_suggestions').empty();
            }
        });

        $(document).on('click', '.kabupaten-suggestion', function(e) {
            e.preventDefault();
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#kabupaten_penggugat').val(name);
            $('#kabupaten_penggugat_suggestions').empty();

            // Fetch and populate Kecamatan based on selected Kabupaten
            $('#kecamatan_penggugat').empty().append('<option value="">Pilih Kecamatan</option>');
            $.get(`/api/kecamatan/${id}`, function(data) {
                $('#kecamatan_penggugat').append(data.map(function(kecamatan) {
                    return `<option value="${kecamatan.name}" data-id="${kecamatan.id}">${kecamatan.name}</option>`;
                }));
            });
        });

        // Fetch and populate Desa based on selected Kecamatan
        $('#kecamatan_penggugat').change(function() {
            var kecamatanId = $('#kecamatan_penggugat option:selected').data('id');
            $('#desa_penggugat').empty().append('<option value="">Pilih Desa</option>');
            $.get(`/api/desa/${kecamatanId}`, function(data) {
                $('#desa_penggugat').append(data.map(function(desa) {
                    return `<option value="${desa.name}">${desa.name}</option>`;
                }));
            }).fail(function() {
                // Handle error
            });
        });
    });


    $(document).ready(function() {
        $('#kabupaten').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) {
                $.get('/api/kabupaten/search', {
                    query: query
                }, function(data) {
                    $('#kabupaten_suggestions').empty();
                    data.forEach(function(kabupaten) {
                        $('#kabupaten_suggestions').append(`<a href="#" class="list-group-item list-group-item-action kabupaten-suggestion" data-id="${kabupaten.id}" data-name="${kabupaten.name}">${kabupaten.name}</a>`);
                    });
                }).fail(function() {
                    // Handle error
                });
            } else {
                $('#kabupaten_suggestions').empty();
            }
        });

        $(document).on('click', '.kabupaten-suggestion', function(e) {
            e.preventDefault();
            var name = $(this).data('name');
            var id = $(this).data('id');
            $('#kabupaten').val(name);
            $('#kabupaten_suggestions').empty();

            // Fetch and populate Kecamatan based on selected Kabupaten
            $('#kecamatan').empty().append('<option value="">Pilih Kecamatan</option>');
            $.get(`/api/kecamatan/${id}`, function(data) {
                $('#kecamatan').append(data.map(function(kecamatan) {
                    return `<option value="${kecamatan.name}" data-id="${kecamatan.id}">${kecamatan.name}</option>`;
                }));
            });
        });

        // Fetch and populate Desa based on selected Kecamatan
        $('#kecamatan').change(function() {
            var kecamatanId = $('#kecamatan option:selected').data('id');
            $('#desa').empty().append('<option value="">Pilih Desa</option>');
            $.get(`/api/desa/${kecamatanId}`, function(data) {
                $('#desa').append(data.map(function(desa) {
                    return `<option value="${desa.name}">${desa.name}</option>`;
                }));
            }).fail(function() {
                // Handle error
            });
        });
    });

</script>
@endpush
