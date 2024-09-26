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
                Silahkan isi data penggugat dan tergugat dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
            </p>

            <form method="POST" action="{{ route('gugatan.page2') }}" @submit.prevent="validateForm" ref="form">
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
                                            <label for="nama_penggugat"><b>Nama Lengkap</b></label>
                                            <input type="text" id="nama_penggugat" name="nama_penggugat" class="form-control" v-model="form.nama_penggugat">
                                            <span v-if="errors.nama_penggugat" class="text-danger">@{{ errors.nama_penggugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="binti_penggugat"><b>Binti</b></label>
                                            <input type="text" id="binti_penggugat" name="binti_penggugat" class="form-control" v-model="form.binti_penggugat">
                                            <span v-if="errors.binti_penggugat" class="text-danger">@{{ errors.binti_penggugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="umur_penggugat"><b>Umur Penggugat</b></label>
                                            <input type="number" id="umur_penggugat" name="umur_penggugat" class="form-control" v-model="form.umur_penggugat">
                                            <span v-if="errors.umur_penggugat" class="text-danger">@{{ errors.umur_penggugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agama_penggugat"><b>Agama</b></label>
                                            <select id="agama_penggugat" name="agama_penggugat" class="form-control" v-model="form.agama_penggugat">
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Khatolik</option>
                                                <option>Hindu</option>
                                                <option>Budha</option>
                                            </select>
                                            <span v-if="errors.agama_penggugat" class="text-danger">@{{ errors.agama_penggugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekerjaan_penggugat"><b>Pekerjaan</b></label>
                                            <input type="text" id="pekerjaan_penggugat" name="pekerjaan_penggugat" class="form-control" v-model="form.pekerjaan_penggugat">
                                            <span v-if="errors.pekerjaan_penggugat" class="text-danger">@{{ errors.pekerjaan_penggugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pendidikan_penggugat"><b>Pendidikan</b></label>
                                            <select id="pendidikan_penggugat" name="pendidikan_penggugat" class="form-control" v-model="form.pendidikan_penggugat">
                                                <option>Tidak Tamat SD</option>
                                                <option>SD</option>
                                                <option>SLTP</option>
                                                <option>SLTA</option>
                                                <option>DI</option>
                                                <option>DII</option>
                                                <option>DIII</option>
                                                <option>S1</option>
                                            </select>
                                            <span v-if="errors.pendidikan_penggugat" class="text-danger">@{{ errors.pendidikan_penggugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_penggugat"><b>Alamat Lengkap</b></label>
                                    <textarea id="alamat_penggugat" name="alamat_penggugat" class="form-control" data-height="100" v-model="form.alamat_penggugat" readonly @click="openPenggugatAddressModal"></textarea>
                                    <span v-if="errors.alamat_penggugat" class="text-danger">@{{ errors.alamat_penggugat }}</span>
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
                                            <label for="nama_tergugat"><b>Nama Lengkap</b></label>
                                            <input type="text" id="nama_tergugat" name="nama_tergugat" class="form-control" v-model="form.nama_tergugat">
                                            <span v-if="errors.nama_tergugat" class="text-danger">@{{ errors.nama_tergugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bin_tergugat"><b>Bin</b></label>
                                            <input type="text" id="bin_tergugat" name="bin_tergugat" class="form-control" v-model="form.bin_tergugat">
                                            <span v-if="errors.bin_tergugat" class="text-danger">@{{ errors.bin_tergugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="umur_tergugat"><b>Umur</b></label>
                                            <input type="number" id="umur_tergugat" name="umur_tergugat" class="form-control" v-model="form.umur_tergugat">
                                            <span v-if="errors.umur_tergugat" class="text-danger">@{{ errors.umur_tergugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="agama_tergugat"><b>Agama</b></label>
                                            <select id="agama_tergugat" name="agama_tergugat" class="form-control" v-model="form.agama_tergugat">
                                                <option>Islam</option>
                                                <option>Kristen</option>
                                                <option>Khatolik</option>
                                                <option>Hindu</option>
                                                <option>Budha</option>
                                            </select>
                                            <span v-if="errors.agama_tergugat" class="text-danger">@{{ errors.agama_tergugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekerjaan_tergugat"><b>Pekerjaan</b></label>
                                            <input type="text" id="pekerjaan_tergugat" name="pekerjaan_tergugat" class="form-control" v-model="form.pekerjaan_tergugat">
                                            <span v-if="errors.pekerjaan_tergugat" class="text-danger">@{{ errors.pekerjaan_tergugat }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pendidikan_tergugat"><b>Pendidikan</b></label>
                                            <select id="pendidikan_tergugat" name="pendidikan_tergugat" class="form-control" v-model="form.pendidikan_tergugat">
                                                <option>Tidak Tamat SD</option>
                                                <option>SD</option>
                                                <option>SLTP</option>
                                                <option>SLTA</option>
                                                <option>DI</option>
                                                <option>DII</option>
                                                <option>DIII</option>
                                                <option>S1</option>
                                            </select>
                                            <span v-if="errors.pendidikan_tergugat" class="text-danger">@{{ errors.pendidikan_tergugat }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_tergugat"><b>Alamat Lengkap</b></label>
                                    <textarea id="alamat_tergugat" name="alamat_tergugat" class="form-control" data-height="100" v-model="form.alamat_tergugat" readonly @click="openAddressModal"></textarea>
                                    <span v-if="errors.alamat_tergugat" class="text-danger">@{{ errors.alamat_tergugat }}</span>
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
    <div v-if="showModal" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Alamat Lengkap Tergugat</h5>
                    <button type="button" class="close text-white" @click="closeAddressModal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="saveAddress">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jalan">Jalan</label>
                                    <input type="text" id="jalan" v-model="address.jalan" class="form-control" placeholder="Masukkan nama jalan">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no">No</label>
                                    <input type="text" id="no" v-model="address.no" class="form-control" placeholder="No Rumah">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rt">RT</label>
                                    <input type="text" id="rt" v-model="address.rt" class="form-control" placeholder="RT">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rw">RW</label>
                                    <input type="text" id="rw" v-model="address.rw" class="form-control" placeholder="RW">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="desa">Desa</label>
                                    <input type="text" id="desa" v-model="address.desa" class="form-control" placeholder="Nama Desa">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" id="kecamatan" v-model="address.kecamatan" class="form-control" placeholder="Nama Kecamatan">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" id="kabupaten" v-model="address.kabupaten" class="form-control" placeholder="Nama Kabupaten">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" @click="closeAddressModal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Penggugat -->
    <div v-if="showPenggugatModal" class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content shadow-lg">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title">Alamat Lengkap Penggugat</h5>
                    <button type="button" class="close text-white" @click="closePenggugatAddressModal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="savePenggugatAddress">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jalan_penggugat">Jalan</label>
                                    <input type="text" id="jalan_penggugat" v-model="penggugatAddress.jalan" class="form-control" placeholder="Masukkan nama jalan">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no_penggugat">No</label>
                                    <input type="text" id="no_penggugat" v-model="penggugatAddress.no" class="form-control" placeholder="No Rumah">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rt_penggugat">RT</label>
                                    <input type="text" id="rt_penggugat" v-model="penggugatAddress.rt" class="form-control" placeholder="RT">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="rw_penggugat">RW</label>
                                    <input type="text" id="rw_penggugat" v-model="penggugatAddress.rw" class="form-control" placeholder="RW">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="desa_penggugat">Desa</label>
                                    <input type="text" id="desa_penggugat" v-model="penggugatAddress.desa" class="form-control" placeholder="Nama Desa">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kecamatan_penggugat">Kecamatan</label>
                                    <input type="text" id="kecamatan_penggugat" v-model="penggugatAddress.kecamatan" class="form-control" placeholder="Nama Kecamatan">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="kabupaten_penggugat">Kabupaten</label>
                                    <input type="text" id="kabupaten_penggugat" v-model="penggugatAddress.kabupaten" class="form-control" placeholder="Nama Kabupaten">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="button" class="btn btn-secondary" @click="closePenggugatAddressModal">Batal</button>
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
<script src="https://cdn.jsdelivr.net/npm/vue@2"></script>


{{-- <script src="{{ asset('js/scripts.js') }}"></script> --}}


@endpush
