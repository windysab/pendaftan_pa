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
                <div class="breadcrumb-item">Gugatan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Gugatan - Data Pernikahan</h2>
            <p class="section-lead">
                Silahkan isi data tergugat dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
            </p>
            <form method="POST" action="{{ isset($gugatan) ? route('gugatan.update.page2', $gugatan->id) : route('gugatan.page3.store') }}" onsubmit="validateForm(event)" id="gugatanForm2">
                @csrf
                @if(isset($gugatan))
                @method('PUT')
                @endif
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Detail Pernikahan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hari_pernikahan"><b>Hari Pernikahan</b></label>
                                            <input type="text" id="hari_pernikahan" name="hari_pernikahan" class="form-control" readonly value="{{ old('hari_pernikahan', $gugatan->hari_pernikahan ?? '') }}">
                                            <span id="error_hari_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_pernikahan"><b>Tanggal Pernikahan</b></label>
                                            <input type="date" id="tanggal_pernikahan" name="tanggal_pernikahan" class="form-control" value="{{ old('tanggal_pernikahan', $gugatan->tanggal_pernikahan ?? '') }}">
                                            <span id="error_tanggal_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="province"><b>Provinsi</b></label>
                                            <select id="province" name="province" class="form-control">
                                                <option value="">Pilih Provinsi</option>
                                            </select>
                                            <span id="error_province" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="regency"><b>Kabupaten</b></label>
                                            <select id="regency" name="regency" class="form-control">
                                                <option value="">Pilih Kabupaten</option>
                                            </select>
                                            <span id="error_regency" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="district"><b>Kecamatan</b></label>
                                            <select id="district" name="district" class="form-control">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                            <span id="error_district" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="village"><b>Desa</b></label>
                                            <select id="village" name="village" class="form-control">
                                                <option value="">Pilih Desa</option>
                                            </select>
                                            <span id="error_village" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_akta_nikah"><b>Nomor Kutipan Akta Nikah</b></label>
                                            <input type="text" id="nomor_akta_nikah" name="nomor_akta_nikah" class="form-control" value="{{ old('nomor_akta_nikah', $gugatan->nomor_akta_nikah ?? '') }}">
                                            <span id="error_nomor_akta_nikah" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_akta_nikah"><b>Tanggal Kutipan Akta Nikah</b></label>
                                            <input type="date" id="tanggal_akta_nikah" name="tanggal_akta_nikah" class="form-control" value="{{ old('tanggal_akta_nikah', $gugatan->tanggal_akta_nikah ?? '') }}">
                                            <span id="error_tanggal_akta_nikah" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kecamatan_kua"><b>Kecamatan Kantor Urusan Agama</b></label>
                                            <input type="text" id="kecamatan_kua" name="kecamatan_kua" class="form-control" value="{{ old('kecamatan_kua', $gugatan->kecamatan_kua ?? '') }}">
                                            <span id="error_kecamatan_kua" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kabupaten_kua"><b>Kabupaten Kantor Urusan Agama</b></label>
                                            <input type="text" id="kabupaten_kua" name="kabupaten_kua" class="form-control" value="{{ old('kabupaten_kua', $gugatan->kabupaten_kua ?? '') }}">
                                            <span id="error_kabupaten_kua" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center-custom">Detail Tempat Tinggal dan Data Anak</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label><b>Setelah pernikahan tersebut Penggugat dan Tergugat bertempat tinggal</b></label>
                                    <select class="form-control" name="tempat_tinggal" id="tempat_tinggal" onchange="toggleDesaInput()">
                                        <option value="">Pilih tempat tinggal</option>
                                        <option value="rumah_sendiri" {{ old('tempat_tinggal', $gugatan->tempat_tinggal ?? '') == 'rumah_sendiri' ? 'selected' : '' }}>Di rumah sendiri, di desa</option>
                                        <option value="rumah_orangtua_penggugat" {{ old('tempat_tinggal', $gugatan->tempat_tinggal ?? '') == 'rumah_orangtua_penggugat' ? 'selected' : '' }}>Di rumah orangtua Penggugat, di desa</option>
                                        <option value="rumah_orangtua_tergugat" {{ old('tempat_tinggal', $gugatan->tempat_tinggal ?? '') == 'rumah_orangtua_tergugat' ? 'selected' : '' }}>Di rumah orangtua Tergugat, di desa</option>
                                        <option value="rumah_kontrakan" {{ old('tempat_tinggal', $gugatan->tempat_tinggal ?? '') == 'rumah_kontrakan' ? 'selected' : '' }}>Di rumah kontrakan / kos, di desa</option>
                                    </select>
                                    <div id="desa_input" style="display: none;">
                                        <input type="text" name="desa" class="form-control mt-2" placeholder="Nama desa" value="{{ old('desa', $gugatan->desa ?? '') }}">
                                        <span id="error_desa" class="text-danger"></span>
                                    </div>
                                    <span id="error_tempat_tinggal" class="text-danger"></span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kumpul_baik_selama_tahun"><b>Kumpul baik selama (tahun)</b></label>
                                            <input type="number" id="kumpul_baik_selama_tahun" name="kumpul_baik_selama_tahun" class="form-control" placeholder="tahun" value="{{ old('kumpul_baik_selama_tahun', $gugatan->kumpul_baik_selama_tahun ?? '') }}">
                                            <span id="error_kumpul_baik_selama_tahun" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kumpul_baik_selama_bulan"><b>Kumpul baik selama (bulan)</b></label>
                                            <input type="number" id="kumpul_baik_selama_bulan" name="kumpul_baik_selama_bulan" class="form-control" placeholder="bulan" value="{{ old('kumpul_baik_selama_bulan', $gugatan->kumpul_baik_selama_bulan ?? '') }}">
                                            <span id="error_kumpul_baik_selama_bulan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jumlah_anak"><b>Telah dikaruniai</b></label>
                                            <input type="number" id="jumlah_anak" name="jumlah_anak" class="form-control" placeholder="jumlah anak" value="{{ old('jumlah_anak', $gugatan->jumlah_anak ?? '') }}">
                                            <span id="error_jumlah_anak" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                @for ($i = 1; $i <= 10; $i++) <div id="anak_{{ $i }}_fields" class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anak_{{ $i }}"><b>{{ $i }}. Nama Anak</b></label>
                                            <input type="text" id="anak_{{ $i }}" name="anak_{{ $i }}" class="form-control" placeholder="Nama Anak" value="{{ old('anak_'.$i, $gugatan->{'anak_'.$i} ?? '') }}">
                                            <span id="error_anak_{{ $i }}" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir_anak_{{ $i }}"><b>Tanggal Lahir</b></label>
                                            <input type="date" id="tanggal_lahir_anak_{{ $i }}" name="tanggal_lahir_anak_{{ $i }}" class="form-control" value="{{ old('tanggal_lahir_anak_'.$i, $gugatan->{'tanggal_lahir_anak_'.$i} ?? '') }}">
                                            <span id="error_tanggal_lahir_anak_{{ $i }}" class="text-danger"></span>
                                        </div>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-primary btn-right">{{ isset($gugatan) ? 'Update' : 'Selanjutnya' }}</button>
        </form>
</div>
</section>
</div>
@endsection

@push('scripts')
<script>
    function toggleDesaInput() {
        var tempatTinggal = document.getElementById('tempat_tinggal').value;
        var desaInput = document.getElementById('desa_input');
        if (tempatTinggal.includes('desa')) {
            desaInput.style.display = 'block';
        } else {
            desaInput.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleDesaInput();
    });

    $(document).ready(function() {
        $.get('/provinces', function(data) {
            $('#province').append('<option value="">Pilih Provinsi</option>');
            $.each(data, function(index, province) {
                $('#province').append('<option value="' + province.id + '">' + province.name + '</option>');
            });
        });

        $('#province').change(function() {
            var province_id = $(this).val();
            $('#regency').empty().append('<option value="">Pilih Kabupaten</option>');
            $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#village').empty().append('<option value="">Pilih Desa</option>');
            if (province_id) {
                $.get('/regencies/' + province_id, function(data) {
                    $.each(data, function(index, regency) {
                        $('#regency').append('<option value="' + regency.id + '">' + regency.name + '</option>');
                    });
                });
            }
        });

        $('#regency').change(function() {
            var regency_id = $(this).val();
            $('#district').empty().append('<option value="">Pilih Kecamatan</option>');
            $('#village').empty().append('<option value="">Pilih Desa</option>');
            if (regency_id) {
                $.get('/districts/' + regency_id, function(data) {
                    $.each(data, function(index, district) {
                        $('#district').append('<option value="' + district.id + '">' + district.name + '</option>');
                    });
                });
            }
        });

        $('#district').change(function() {
            var district_id = $(this).val();
            $('#village').empty().append('<option value="">Pilih Desa</option>');
            if (district_id) {
                console.log('Fetching villages for district_id:', district_id); // Logging
                $.get('/villages/' + district_id, function(data) {
                    console.log('Villages data:', data); // Logging
                    $.each(data, function(index, village) {
                        $('#village').append('<option value="' + village.id + '">' + village.name + '</option>');
                    });
                }).fail(function() {
                    console.error('Failed to fetch villages'); // Logging
                });
            }
        });
        
    });

</script>
@endpush
