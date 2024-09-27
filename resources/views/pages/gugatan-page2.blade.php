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

            <form method="POST" action="{{ route('gugatan.page3') }}" onsubmit="validateForm(event)" id="gugatanForm2">
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
                                            <label for="hari_pernikahan">Hari Pernikahan</label>
                                            <input type="text" id="hari_pernikahan" name="hari_pernikahan" class="form-control" readonly>
                                            <span id="error_hari_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_pernikahan">Tanggal Pernikahan</label>
                                            <input type="date" id="tanggal_pernikahan" name="tanggal_pernikahan" class="form-control">
                                            <span id="error_tanggal_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="desa_pernikahan">Desa</label>
                                            <input type="text" id="desa_pernikahan" name="desa_pernikahan" class="form-control">
                                            <span id="error_desa_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kecamatan_pernikahan">Kecamatan</label>
                                            <input type="text" id="kecamatan_pernikahan" name="kecamatan_pernikahan" class="form-control">
                                            <span id="error_kecamatan_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kabupaten_pernikahan">Kabupaten</label>
                                            <input type="text" id="kabupaten_pernikahan" name="kabupaten_pernikahan" class="form-control">
                                            <span id="error_kabupaten_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_akta_nikah">Nomor Kutipan Akta Nikah</label>
                                            <input type="text" id="nomor_akta_nikah" name="nomor_akta_nikah" class="form-control">
                                            <span id="error_nomor_akta_nikah" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_akta_nikah">Tanggal Kutipan Akta Nikah</label>
                                            <input type="date" id="tanggal_akta_nikah" name="tanggal_akta_nikah" class="form-control">
                                            <span id="error_tanggal_akta_nikah" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kecamatan_kua">Kecamatan Kantor Urusan Agama</label>
                                            <input type="text" id="kecamatan_kua" name="kecamatan_kua" class="form-control">
                                            <span id="error_kecamatan_kua" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kabupaten_kua">Kabupaten Kantor Urusan Agama</label>
                                            <input type="text" id="kabupaten_kua" name="kabupaten_kua" class="form-control">
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
                                    <label>Setelah pernikahan tersebut Penggugat dan Tergugat bertempat
                                        tinggal</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_tinggal" id="rumah_sendiri" value="rumah_sendiri">
                                        <label class="form-check-label" for="rumah_sendiri">
                                            Di rumah sendiri, di desa
                                            <input type="text" name="desa_rumah_sendiri" class="form-control">
                                            <span id="error_tempat_tinggal" class="text-danger"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_tinggal" id="rumah_orangtua_penggugat" value="rumah_orangtua_penggugat">
                                        <label class="form-check-label" for="rumah_orangtua_penggugat">
                                            Di rumah orangtua Penggugat, di desa
                                            <input type="text" name="desa_rumah_orangtua_penggugat" class="form-control">
                                            <span id="error_tempat_tinggal" class="text-danger"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_tinggal" id="rumah_orangtua_tergugat" value="rumah_orangtua_tergugat">
                                        <label class="form-check-label" for="rumah_orangtua_tergugat">
                                            Di rumah orangtua Tergugat, di desa
                                            <input type="text" name="desa_rumah_orangtua_tergugat" class="form-control">
                                            <span id="error_tempat_tinggal" class="text-danger"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_tinggal" id="rumah_kontrakan" value="rumah_kontrakan">
                                        <label class="form-check-label" for="rumah_kontrakan">
                                            Di rumah kontrakan / kos, di desa
                                            <input type="text" name="desa_rumah_kontrakan" class="form-control">
                                            <span id="error_tempat_tinggal" class="text-danger"></span>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_tinggal" id="lainnya" value="lainnya">
                                        <label class="form-check-label" for="lainnya">
                                            Lainnya, di desa
                                            <input type="text" name="desa_lainnya" class="form-control">
                                            <span id="error_tempat_tinggal" class="text-danger"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kumpul_baik_selama_tahun">Kumpul baik selama
                                                (tahun)</label>
                                            <input type="number" id="kumpul_baik_selama_tahun" name="kumpul_baik_selama_tahun" class="form-control" placeholder="tahun">
                                            <span id="error_kumpul_baik_selama_tahun" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kumpul_baik_selama_bulan">Kumpul baik selama
                                                (bulan)</label>
                                            <input type="number" id="kumpul_baik_selama_bulan" name="kumpul_baik_selama_bulan" class="form-control" placeholder="bulan">
                                            <span id="error_kumpul_baik_selama_bulan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jumlah_anak">Telah dikaruniai</label>
                                            <input type="number" id="jumlah_anak" name="jumlah_anak" class="form-control" placeholder="jumlah anak">
                                            <span id="error_jumlah_anak" class="text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                @for ($i = 1; $i <= 10; $i++)
                                <div id="anak_{{ $i }}_fields" class="row" style="display: none;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="anak_{{ $i }}"> {{ $i }}. Nama Anak</label>
                                            <input type="text" id="anak_{{ $i }}" name="anak_{{ $i }}" class="form-control" placeholder="Nama Anak">
                                            <span id="error_anak_{{ $i }}" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_lahir_anak_{{ $i }}">Tanggal Lahir</label>
                                            <input type="date" id="tanggal_lahir_anak_{{ $i }}" name="tanggal_lahir_anak_{{ $i }}" class="form-control">
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
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Selanjutnya</button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        const errors = {};

        const requiredFields = [
            'hari_pernikahan', 'tanggal_pernikahan', 'desa_pernikahan', 'kecamatan_pernikahan',
            'kabupaten_pernikahan', 'nomor_akta_nikah', 'tanggal_akta_nikah', 'kecamatan_kua',
            'kabupaten_kua', 'tempat_tinggal', 'kumpul_baik_selama_tahun', 'kumpul_baik_selama_bulan',
            'jumlah_anak'
        ];

        requiredFields.forEach(field => {
            const input = form.querySelector(`[name="${field}"]`);
            const errorSpan = document.getElementById(`error_${field}`);
            if (!input || !input.value.trim()) {
                errors[field] = `${field.replace(/_/g, ' ')} wajib diisi.`;
                if (errorSpan) {
                    errorSpan.textContent = errors[field];
                }
            } else {
                if (errorSpan) {
                    errorSpan.textContent = '';
                }
            }
        });

        // Tampilkan pesan error jika ada
        if (Object.keys(errors).length === 0) {
            form.submit();
        }
    });
});
</script>
@endpush
