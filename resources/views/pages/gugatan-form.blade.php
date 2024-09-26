@extends('layouts.app')

@section('title', 'Gugatan - Data Penggugat')

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
                <h2 class="section-title">Formulir Gugatan - Data Penggugat dan Tergugat</h2>
                <p class="section-lead">
                    Silahkan isi data penggugat dan tergugat dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.page2') }}">
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
                                                <label for="nama_penggugat">Nama Lengkap</label>
                                                <input type="text" id="nama_penggugat" name="nama_penggugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="binti_penggugat">Binti</label>
                                                <input type="text" id="binti_penggugat" name="binti_penggugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_penggugat">Umur Penggugat</label>
                                                <input type="number" id="umur_penggugat" name="umur_penggugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_penggugat">Agama</label>
                                                <select id="agama_penggugat" name="agama_penggugat" class="form-control"
                                                    required>
                                                    <option>Islam</option>
                                                    <option>Kristen</option>
                                                    <option>Khatolik</option>
                                                    <option>Hindu</option>
                                                    <option>Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_penggugat">Pekerjaan Penggugat</label>
                                                <input type="text" id="pekerjaan_penggugat" name="pekerjaan_penggugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_penggugat">Pendidikan Penggugat</label>
                                                <select id="pendidikan_penggugat" name="pendidikan_penggugat"
                                                    class="form-control" required>
                                                    <option>Tidak Tamat SD</option>
                                                    <option>SD</option>
                                                    <option>SLTP</option>
                                                    <option>SLTA</option>
                                                    <option>DI</option>
                                                    <option>DII</option>
                                                    <option>DIII</option>
                                                    <option>S1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_penggugat">Alamat</label>
                                        <textarea id="alamat_penggugat" name="alamat_penggugat" class="form-control"
                                            data-height="120" required></textarea>
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
                                                <label for="nama_tergugat">Nama Lengkap</label>
                                                <input type="text" id="nama_tergugat" name="nama_tergugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="bin_tergugat">Bin</label>
                                                <input type="text" id="bin_tergugat" name="bin_tergugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="umur_tergugat">Umur</label>
                                                <input type="number" id="umur_tergugat" name="umur_tergugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="agama_tergugat">Agama</label>
                                                <select id="agama_tergugat" name="agama_tergugat" class="form-control"
                                                    required>
                                                    <option>Islam</option>
                                                    <option>Kristen</option>
                                                    <option>Khatolik</option>
                                                    <option>Hindu</option>
                                                    <option>Budha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pekerjaan_tergugat">Pekerjaan</label>
                                                <input type="text" id="pekerjaan_tergugat" name="pekerjaan_tergugat"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="pendidikan_tergugat">Pendidikan</label>
                                                <select id="pendidikan_tergugat" name="pendidikan_tergugat"
                                                    class="form-control" required>
                                                    <option>Tidak Tamat SD</option>
                                                    <option>SD</option>
                                                    <option>SLTP</option>
                                                    <option>SLTA</option>
                                                    <option>DI</option>
                                                    <option>DII</option>
                                                    <option>DIII</option>
                                                    <option>S1</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat_tergugat">Alamat</label>
                                        <textarea id="alamat_tergugat" name="alamat_tergugat" class="form-control"
                                            data-height="120" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Next</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
