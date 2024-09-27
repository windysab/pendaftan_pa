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
                    <div class="breadcrumb-item">Gugatan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Formulir Gugatan - Data Penggugat dan Tergugat</h2>
                <p class="section-lead">
                    Silahkan isi data penggugat dan tergugat dibawah ini. Pastikan data yang anda masukkan benar. Terima
                    kasih.
                </p>

                <form method="POST" action="{{ route('gugatan-form.save') }}" onsubmit="validateForm(event)" id="gugatanForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Penggugat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_penggugat"><b>Nama Penggugat</b></label>
                                                <input type="text" id="nama_penggugat" name="nama_penggugat"
                                                    class="form-control" value="{{ old('nama_penggugat', $data['nama_penggugat'] ?? '') }}">
                                                <span id="error_nama_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="binti_penggugat"><b>Binti Penggugat</b></label>
                                                <input type="text" id="binti_penggugat" name="binti_penggugat"
                                                    class="form-control" value="{{ old('binti_penggugat', $data['binti_penggugat'] ?? '') }}">
                                                <span id="error_binti_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_penggugat"><b>Umur Penggugat</b></label>
                                                <input type="text" id="umur_penggugat" name="umur_penggugat"
                                                    class="form-control" value="{{ old('umur_penggugat', $data['umur_penggugat'] ?? '') }}">
                                                <span id="error_umur_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_penggugat"><b>Agama Penggugat</b></label>
                                                <select id="agama_penggugat" name="agama_penggugat" class="form-control">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Buddha" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                    <option value="Konghucu" {{ old('agama_penggugat', $data['agama_penggugat'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                </select>
                                                <span id="error_agama_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_penggugat"><b>Pekerjaan Penggugat</b></label>
                                                <input type="text" id="pekerjaan_penggugat" name="pekerjaan_penggugat"
                                                    class="form-control" value="{{ old('pekerjaan_penggugat', $data['pekerjaan_penggugat'] ?? '') }}">
                                                <span id="error_pekerjaan_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_penggugat"><b>Pendidikan Penggugat</b></label>
                                                <select id="pendidikan_penggugat" name="pendidikan_penggugat" class="form-control">
                                                    <option value="">Pilih Pendidikan</option>
                                                    <option value="SD" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                                    <option value="SMP" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                    <option value="SMA" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                    <option value="D3" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="S1" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                                    <option value="S2" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ old('pendidikan_penggugat', $data['pendidikan_penggugat'] ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                                                </select>
                                                <span id="error_pendidikan_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_penggugat"><b>Alamat Lengkap</b></label>
                                        <textarea id="alamat_penggugat" name="alamat_penggugat" class="form-control" data-height="100" readonly
                                            onclick="openPenggugatAddressModal()">{{ old('alamat_penggugat', $data['alamat_penggugat'] ?? '') }}</textarea>
                                        <span id="error_alamat_penggugat" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header text-center-custom">
                                    <h4 class="text-center-custom">Data Tergugat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_tergugat"><b>Nama Tergugat</b></label>
                                                <input type="text" id="nama_tergugat" name="nama_tergugat"
                                                    class="form-control" value="{{ old('nama_tergugat', $data['nama_tergugat'] ?? '') }}">
                                                <span id="error_nama_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bin_tergugat"><b>Bin Tergugat</b></label>
                                                <input type="text" id="bin_tergugat" name="bin_tergugat"
                                                    class="form-control" value="{{ old('bin_tergugat', $data['bin_tergugat'] ?? '') }}">
                                                <span id="error_bin_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_tergugat"><b>Umur Tergugat</b></label>
                                                <input type="text" id="umur_tergugat" name="umur_tergugat"
                                                    class="form-control" value="{{ old('umur_tergugat', $data['umur_tergugat'] ?? '') }}">
                                                <span id="error_umur_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_tergugat"><b>Agama Tergugat</b></label>
                                                <select id="agama_tergugat" name="agama_tergugat" class="form-control">
                                                    <option value="">Pilih Agama</option>
                                                    <option value="Islam" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Buddha" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                    <option value="Konghucu" {{ old('agama_tergugat', $data['agama_tergugat'] ?? '') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                </select>
                                                <span id="error_agama_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_tergugat"><b>Pekerjaan Tergugat</b></label>
                                                <input type="text" id="pekerjaan_tergugat" name="pekerjaan_tergugat"
                                                    class="form-control" value="{{ old('pekerjaan_tergugat', $data['pekerjaan_tergugat'] ?? '') }}">
                                                <span id="error_pekerjaan_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_tergugat"><b>Pendidikan Tergugat</b></label>
                                                <select id="pendidikan_tergugat" name="pendidikan_tergugat" class="form-control">
                                                    <option value="">Pilih Pendidikan</option>
                                                    <option value="SD" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'SD' ? 'selected' : '' }}>SD</option>
                                                    <option value="SMP" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                    <option value="SMA" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                                    <option value="D3" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'D3' ? 'selected' : '' }}>D3</option>
                                                    <option value="S1" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'S1' ? 'selected' : '' }}>S1</option>
                                                    <option value="S2" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'S2' ? 'selected' : '' }}>S2</option>
                                                    <option value="S3" {{ old('pendidikan_tergugat', $data['pendidikan_tergugat'] ?? '') == 'S3' ? 'selected' : '' }}>S3</option>
                                                </select>
                                                <span id="error_pendidikan_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_tergugat"><b>Alamat Lengkap</b></label>
                                        <textarea id="alamat_tergugat" name="alamat_tergugat" class="form-control" data-height="100" readonly
                                            onclick="openAddressModal()">{{ old('alamat_tergugat', $data['alamat_tergugat'] ?? '') }}</textarea>
                                        <span id="error_alamat_tergugat" class="text-danger"></span>
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

        <!-- Modal for Tergugat -->
        <div id="tergugatModal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Alamat Lengkap Tergugat</h5>
                        <button type="button" class="close text-white" onclick="closeAddressModal()">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tergugatForm" onsubmit="saveAddress(event)">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jalan"><b>Jalan</b></label>
                                        <input type="text" id="jalan" class="form-control"
                                            placeholder="Masukkan nama jalan">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="no"><b>No</b></label>
                                        <input type="text" id="no" class="form-control"
                                            placeholder="No Rumah">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rt"><b>RT</b></label>
                                        <input type="text" id="rt" class="form-control" placeholder="RT">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rw"><b>RW</b></label>
                                        <input type="text" id="rw" class="form-control" placeholder="RW">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="desa"><b>Desa</b></label>
                                        <input type="text" id="desa" class="form-control"
                                            placeholder="Nama Desa">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kecamatan"><b>Kecamatan</b></label>
                                        <input type="text" id="kecamatan" class="form-control"
                                            placeholder="Nama Kecamatan">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="kabupaten"><b>Kabupaten</b></label>
                                        <input type="text" id="kabupaten" class="form-control"
                                            placeholder="Nama Kabupaten">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="closeAddressModal()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal for Penggugat -->
        <div id="penggugatModal" class="modal fade show" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Alamat Lengkap Penggugat</h5>
                        <button type="button" class="close text-white" onclick="closePenggugatAddressModal()">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="penggugatForm" onsubmit="savePenggugatAddress(event)">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jalan_penggugat"><b>Jalan</b></label>
                                        <input type="text" id="jalan_penggugat" class="form-control"
                                            placeholder="Masukkan nama jalan">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="no_penggugat"><b>No</b></label>
                                        <input type="text" id="no_penggugat" class="form-control"
                                            placeholder="No Rumah">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rt_penggugat"><b>RT</b></label>
                                        <input type="text" id="rt_penggugat" class="form-control" placeholder="RT">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rw_penggugat"><b>RW</b></label>
                                        <input type="text" id="rw_penggugat" class="form-control" placeholder="RW">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group  ">
                                        <label for="desa_penggugat"><b>Desa</b></label>
                                        <input type="text" id="desa_penggugat" class="form-control"
                                            placeholder="Nama Desa">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kecamatan_penggugat"><b>Kecamatan</b></label>
                                        <input type="text" id="kecamatan_penggugat" class="form-control"
                                            placeholder="Nama Kecamatan">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group"></div>
                                        <label for="kabupaten_penggugat"><b>Kabupaten</b></label>
                                        <input type="text" id="kabupaten_penggugat" class="form-control"
                                            placeholder="Nama Kabupaten">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="closePenggugatAddressModal()">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
 <!-- JS Libraries -->
 <script src="{{ asset('js/scripts.js') }}"></script>
@endpush
