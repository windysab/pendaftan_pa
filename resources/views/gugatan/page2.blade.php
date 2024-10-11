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
            {{-- <form method="POST" action="{{ route('gugatan.page3', ['id' => $gugatan->id ?? 1]) }}" onsubmit="validateForm(event)" id="gugatanForm2">
                @csrf --}}
                <form method="POST" action="{{ isset($gugatan) ? route('gugatan.edit.page3', $gugatan->id) : route('gugatan.page3.post') }}" onsubmit="validateForm(event)" id="gugatanForm2">
                    @csrf
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
                                            <input type="text" id="hari_pernikahan" name="hari_pernikahan" class="form-control" value="{{ old('hari_pernikahan', $gugatan->hari_pernikahan ?? '') }}" readonly>
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
                                            <label for="desa_pernikahan"><b>Desa</b></label>
                                            <input type="text" id="desa_pernikahan" name="desa_pernikahan" class="form-control" value="{{ old('desa_pernikahan', $gugatan->desa_pernikahan ?? '') }}">
                                            <span id="error_desa_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kecamatan_pernikahan"><b>Kecamatan</b></label>
                                            <input type="text" id="kecamatan_pernikahan" name="kecamatan_pernikahan" class="form-control" value="{{ old('kecamatan_pernikahan', $gugatan->kecamatan_pernikahan ?? '') }}">
                                            <span id="error_kecamatan_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kabupaten_pernikahan"><b>Kabupaten</b></label>
                                            <input type="text" id="kabupaten_pernikahan" name="kabupaten_pernikahan" class="form-control" value="{{ old('kabupaten_pernikahan', $gugatan->kabupaten_pernikahan ?? '') }}">
                                            <span id="error_kabupaten_pernikahan" class="text-danger"></span>
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

                                @for ($i = 1; $i <= 10; $i++)
                                <div id="anak_{{ $i }}_fields" class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anak_{{ $i }}"><b>{{ $i }}. Nama Anak</b></label>
                                            <input type="text" id="anak_{{ $i }}" name="anak_{{ $i }}" class="form-control" placeholder="Nama Anak" value="{{ old('anak_' . $i, $gugatan->{'anak_' . $i} ?? '') }}">
                                            <span id="error_anak_{{ $i }}" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir_anak_{{ $i }}"><b>Tanggal Lahir</b></label>
                                            <input type="date" id="tanggal_lahir_anak_{{ $i }}" name="tanggal_lahir_anak_{{ $i }}" class="form-control" value="{{ old('tanggal_lahir_anak_' . $i, $gugatan->{'tanggal_lahir_anak_' . $i} ?? '') }}">
                                            <span id="error_tanggal_lahir_anak_{{ $i }}" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <button type="submit" class="btn btn-primary btn-right">Selanjutnya</button>
        </form>
</div>
</section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
