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

                <form method="POST" action="{{ isset($gugatan) ? route('gugatan.update', $gugatan->id) : route('page2') }}"
                    onsubmit="validateForm(event)" id="gugatanForm">
                    @csrf
                    @if (isset($gugatan))
                        @method('PUT')
                    @endif
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Penggugat/ Istri</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_penggugat"><b>Nama Penggugat</b></label>
                                                <input type="text" id="nama_penggugat" name="nama_penggugat"
                                                    class="form-control"
                                                    value="{{ old('nama_penggugat', $gugatan->nama_penggugat ?? '') }}">
                                                <span id="error_nama_penggugat" class="text-danger"></span>
                                                <small class="text-muted" style="font-style: italic;">Diisi sesuai
                                                    dengan</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="binti_penggugat"><b>Binti Penggugat</b></label>
                                                <input type="text" id="binti_penggugat" name="binti_penggugat"
                                                    class="form-control"
                                                    value="{{ old('binti_penggugat', $gugatan->binti_penggugat ?? '') }}">
                                                <span id="error_binti_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_penggugat"><b>Umur Penggugat</b></label>
                                                <input type="number" id="umur_penggugat" name="umur_penggugat"
                                                    class="form-control"
                                                    value="{{ old('umur_penggugat', $gugatan->umur_penggugat ?? '') }}">
                                                <span id="error_umur_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_penggugat"><b>Agama Penggugat</b></label>
                                                <select id="agama_penggugat" name="agama_penggugat" class="form-control">
                                                    <!-- Add options here -->
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>

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
                                                    class="form-control"
                                                    value="{{ old('pekerjaan_penggugat', $gugatan->pekerjaan_penggugat ?? '') }}">
                                                <span id="error_pekerjaan_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_penggugat"><b>Pendidikan Penggugat</b></label>
                                                <select id="pendidikan_penggugat" name="pendidikan_penggugat"
                                                    class="form-control">
                                                    <!-- Add options here -->
                                                    <option value="tidak tamat sd">Tidak Tamat SD</option>
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="d1">D1</option>
                                                    <option value="d3">D3</option>
                                                    <option value="s1">S1</option>

                                                </select>
                                                <span id="error_pendidikan_penggugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_penggugat"><b>Alamat Lengkap</b></label>
                                        <textarea id="alamat_penggugat" name="alamat_penggugat" class="form-control" data-height="100" readonly
                                            onclick="openPenggugatAddressModal()">{{ old('alamat_penggugat', $gugatan->alamat_penggugat ?? '') }}</textarea>
                                        <span id="error_alamat_penggugat" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header text-center-custom">
                                    <h4 class="text-center-custom">Data Tergugat/ Suami</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_tergugat"><b>Nama Tergugat</b></label>
                                                <input type="text" id="nama_tergugat" name="nama_tergugat"
                                                    class="form-control"
                                                    value="{{ old('nama_tergugat', $gugatan->nama_tergugat ?? '') }}">
                                                <span id="error_nama_tergugat" class="text-danger"></span>
                                                <small class="text-muted" style="font-style: italic;">Diisi sesuai
                                                    dengan</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bin_tergugat"><b>Bin Tergugat</b></label>
                                                <input type="text" id="bin_tergugat" name="bin_tergugat"
                                                    class="form-control"
                                                    value="{{ old('bin_tergugat', $gugatan->bin_tergugat ?? '') }}">
                                                <span id="error_bin_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_tergugat"><b>Umur Tergugat</b></label>
                                                <input type="number" id="umur_tergugat" name="umur_tergugat"
                                                    class="form-control"
                                                    value="{{ old('umur_tergugat', $gugatan->umur_tergugat ?? '') }}">
                                                <span id="error_umur_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_tergugat"><b>Agama Tergugat</b></label>
                                                <select id="agama_tergugat" name="agama_tergugat" class="form-control">
                                                    <!-- Add options here -->
                                                    <option value="islam">Islam</option>
                                                    <option value="kristen">Kristen</option>
                                                    <option value="katolik">Katolik</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="budha">Budha</option>
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
                                                    class="form-control"
                                                    value="{{ old('pekerjaan_tergugat', $gugatan->pekerjaan_tergugat ?? '') }}">
                                                <span id="error_pekerjaan_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_tergugat"><b>Pendidikan Tergugat</b></label>
                                                <select id="pendidikan_tergugat" name="pendidikan_tergugat"
                                                    class="form-control">
                                                    <!-- Add options here -->
                                                    <option value="tidak tamat sd">Tidak Tamat SD</option>
                                                    <option value="sd">SD</option>
                                                    <option value="smp">SMP</option>
                                                    <option value="sma">SMA</option>
                                                    <option value="d1">D1</option>
                                                    <option value="d3">D3</option>
                                                    <option value="s1">S1</option>

                                                </select>
                                                <span id="error_pendidikan_tergugat" class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_tergugat"><b>Alamat Lengkap</b></label>
                                        <textarea id="alamat_tergugat" name="alamat_tergugat" class="form-control" data-height="100" readonly
                                            onclick="openAddressModal()">{{ old('alamat_tergugat', $gugatan->alamat_tergugat ?? '') }}</textarea>
                                        <span id="error_alamat_tergugat" class="text-danger"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary btn-right">{{ isset($gugatan) ? 'Update' : 'Submit' }}</button>
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
                                        <input type="number" id="no" class="form-control"
                                            placeholder="No Rumah">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rt"><b>RT</b></label>
                                        <input type="number" id="rt" class="form-control" placeholder="RT">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rw"><b>RW</b></label>
                                        <input type="number" id="rw" class="form-control" placeholder="RW">
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
                    <div class="modal-header bg-info text-white">
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
                                        <input type="number" id="no_penggugat" class="form-control"
                                            placeholder="No Rumah">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rt_penggugat"><b>RT</b></label>
                                        <input type="number" id="rt_penggugat" class="form-control" placeholder="RT">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rw_penggugat"><b>RW</b></label>
                                        <input type="number" id="rw_penggugat" class="form-control" placeholder="RW">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
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
                                    <div class="form-group">
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
