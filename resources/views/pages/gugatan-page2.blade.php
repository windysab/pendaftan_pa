@extends('layouts.app')

@section('title', 'Gugatan - Data Tergugat')

@push('style')
<!-- CSS Libraries -->
<style>
    /* .list-group {
        position: absolute;
        z-index: 1000;
        width: 100%;
        background-color: white;
        border: 1px solid #ccc;
    } */

</style>
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
                                            <label for="desa_pernikahan"><b>Desa</b></label>
                                            <select id="desa_pernikahan" name="desa_pernikahan" class="form-control">
                                                <option value="">Pilih Desa</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                            <span id="error_desa_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kecamatan_pernikahan"><b>Kecamatan</b></label>
                                            <select id="kecamatan_pernikahan" name="kecamatan_pernikahan" class="form-control">
                                                <option value="">Pilih Kecamatan</option>
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                            <span id="error_kecamatan_pernikahan" class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kabupaten_pernikahan"><b>Kabupaten</b></label>
                                            <input type="text" id="kabupaten_pernikahan" name="kabupaten_pernikahan" class="form-control" placeholder="Cari Kabupaten">
                                            <div id="kabupaten_suggestions" class="list-group"></div>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    // $(document).ready(function() {
    //     $('#kabupaten_pernikahan').on('input', function() {
    //         var query = $(this).val();
    //         console.log("User input:", query); // Debugging log
    //         if (query.length > 2) {
    //             $.get('/api/kabupaten/search', {
    //                 query: query
    //             }, function(data) {
    //                 console.log("Fetched data:", data); // Debugging log
    //                 $('#kabupaten_suggestions').empty();
    //                 data.forEach(function(kabupaten) {
    //                     $('#kabupaten_suggestions').append(`<a href="#" class="list-group-item list-group-item-action kabupaten-suggestion" data-id="${kabupaten.id}" data-name="${kabupaten.name}">${kabupaten.name}</a>`);
    //                 });
    //             }).fail(function(jqXHR, textStatus, errorThrown) {
    //                 console.error("Failed to fetch kabupaten data:", textStatus, errorThrown); // Debugging log
    //             });
    //         } else {
    //             $('#kabupaten_suggestions').empty();
    //         }
    //     });

    //     $(document).on('click', '.kabupaten-suggestion', function(e) {
    //         e.preventDefault();
    //         var name = $(this).data('name');
    //         var id = $(this).data('id');
    //         $('#kabupaten_pernikahan').val(name);
    //         $('#kabupaten_suggestions').empty();

    //         // Fetch and populate Kecamatan based on selected Kabupaten
    //         $('#kecamatan_pernikahan').empty().append('<option value="">Pilih Kecamatan</option>');
    //         $.get(`/api/kecamatan/${id}`, function(data) {
    //             $('#kecamatan_pernikahan').append(data.map(function(kecamatan) {
    //                 return `<option value="${kecamatan.id}">${kecamatan.name}</option>`;
    //             }));
    //         });
    //     });

    //     // Fetch and populate Desa based on selected Kecamatan
    //     $('#kecamatan_pernikahan').change(function() {
    //         var kecamatanId = $(this).val();
    //         var name = $(this).data('name');
    //         $('#desa_pernikahan').empty().append('<option value="">Pilih Desa</option>');
    //         $.get(`/api/desa/${kecamatanId}`, function(data) {
    //             $('#desa_pernikahan').append(data.map(function(desa) {
    //                 return `<option value="${desa.name}">${desa.name}</option>`;
    //             }));
    //         });
    //     });
    // });

    // $(document).ready(function() {
    //     $('#kabupaten_pernikahan').on('input', function() {
    //         var query = $(this).val();
    //         console.log("User input:", query); // Debugging log
    //         if (query.length > 2) {
    //             $.get('/api/kabupaten/search', {
    //                 query: query
    //             }, function(data) {
    //                 console.log("Fetched data:", data); // Debugging log
    //                 $('#kabupaten_suggestions').empty();
    //                 data.forEach(function(kabupaten) {
    //                     $('#kabupaten_suggestions').append(`<a href="#" class="list-group-item list-group-item-action kabupaten-suggestion" data-id="${kabupaten.id}" data-name="${kabupaten.name}">${kabupaten.name}</a>`);
    //                 });
    //             }).fail(function(jqXHR, textStatus, errorThrown) {
    //                 console.error("Failed to fetch kabupaten data:", textStatus, errorThrown); // Debugging log
    //             });
    //         } else {
    //             $('#kabupaten_suggestions').empty();
    //         }
    //     });

    //     $(document).on('click', '.kabupaten-suggestion', function(e) {
    //         e.preventDefault();
    //         var name = $(this).data('name');
    //         var id = $(this).data('id');
    //         $('#kabupaten_pernikahan').val(name);
    //         $('#kabupaten_suggestions').empty();

    //         // Fetch and populate Kecamatan based on selected Kabupaten
    //         $('#kecamatan_pernikahan').empty().append('<option value="">Pilih Kecamatan</option>');
    //         $.get(`/api/kecamatan/${id}`, function(data) {
    //             $('#kecamatan_pernikahan').append(data.map(function(kecamatan) {
    //                 return `<option value="${kecamatan.id}">${kecamatan.name}</option>`;
    //             }));
    //         });
    //     });

    //     // Fetch and populate Desa based on selected Kecamatan
    //     $('#kecamatan_pernikahan').change(function() {
    //         var kecamatanId = $(this).val();
    //         console.log("Selected Kecamatan ID:", kecamatanId); // Debugging log
    //         $('#desa_pernikahan').empty().append('<option value="">Pilih Desa</option>');
    //         $.get(`/api/desa/${kecamatanId}`, function(data) {
    //             console.log("Fetched Desa data:", data); // Debugging log
    //             if (data.length === 0) {
    //                 console.warn("No desa data found for the selected kecamatan."); // Debugging log
    //             }
    //             $('#desa_pernikahan').append(data.map(function(desa) {
    //                 return `<option value="${desa.name}">${desa.name}</option>`;
    //             }));
    //         }).fail(function(jqXHR, textStatus, errorThrown) {
    //             console.error("Failed to fetch desa data:", textStatus, errorThrown); // Debugging log
    //         });
    //     });
    // });

    // $(document).ready(function() {
    //     $('#kabupaten_pernikahan').on('input', function() {
    //         var query = $(this).val();
    //         console.log("User input:", query); // Debugging log
    //         if (query.length > 2) {
    //             $.get('/api/kabupaten/search', {
    //                 query: query
    //             }, function(data) {
    //                 console.log("Fetched data:", data); // Debugging log
    //                 $('#kabupaten_suggestions').empty();
    //                 data.forEach(function(kabupaten) {
    //                     $('#kabupaten_suggestions').append(`<a href="#" class="list-group-item list-group-item-action kabupaten-suggestion" data-id="${kabupaten.id}" data-name="${kabupaten.name}">${kabupaten.name}</a>`);
    //                 });
    //             }).fail(function(jqXHR, textStatus, errorThrown) {
    //                 console.error("Failed to fetch kabupaten data:", textStatus, errorThrown); // Debugging log
    //             });
    //         } else {
    //             $('#kabupaten_suggestions').empty();
    //         }
    //     });

    //     $(document).on('click', '.kabupaten-suggestion', function(e) {
    //         e.preventDefault();
    //         var name = $(this).data('name');
    //         var id = $(this).data('id');
    //         $('#kabupaten_pernikahan').val(name);
    //         $('#kabupaten_suggestions').empty();

    //         // Fetch and populate Kecamatan based on selected Kabupaten
    //         $('#kecamatan_pernikahan').empty().append('<option value="">Pilih Kecamatan</option>');
    //         $.get(`/api/kecamatan/${id}`, function(data) {
    //             $('#kecamatan_pernikahan').append(data.map(function(kecamatan) {
    //                 return `<option value="${kecamatan.name}" data-id="${kecamatan.id}">${kecamatan.name}</option>`;
    //             }));
    //         });
    //     });

    //     // Fetch and populate Desa based on selected Kecamatan
    //     $('#kecamatan_pernikahan').change(function() {
    //         var kecamatanName = $(this).val();
    //         var kecamatanId = $('#kecamatan_pernikahan option:selected').data('id');
    //         console.log("Selected Kecamatan Name:", kecamatanName); // Debugging log
    //         console.log("Selected Kecamatan ID:", kecamatanId); // Debugging log
    //         $('#desa_pernikahan').empty().append('<option value="">Pilih Desa</option>');
    //         $.get(`/api/desa/${kecamatanId}`, function(data) {
    //             console.log("Fetched Desa data:", data); // Debugging log
    //             if (data.length === 0) {
    //                 console.warn("No desa data found for the selected kecamatan."); // Debugging log
    //             }
    //             $('#desa_pernikahan').append(data.map(function(desa) {
    //                 return `<option value="${desa.name}">${desa.name}</option>`;
    //             }));
    //         }).fail(function(jqXHR, textStatus, errorThrown) {
    //             console.error("Failed to fetch desa data:", textStatus, errorThrown); // Debugging log
    //         });
    //     });
    // });

    $(document).ready(function() {
        $('#kabupaten_pernikahan').on('input', function() {
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
            $('#kabupaten_pernikahan').val(name);
            $('#kabupaten_suggestions').empty();

            // Fetch and populate Kecamatan based on selected Kabupaten
            $('#kecamatan_pernikahan').empty().append('<option value="">Pilih Kecamatan</option>');
            $.get(`/api/kecamatan/${id}`, function(data) {
                $('#kecamatan_pernikahan').append(data.map(function(kecamatan) {
                    return `<option value="${kecamatan.name}" data-id="${kecamatan.id}">${kecamatan.name}</option>`;
                }));
            });
        });

        // Fetch and populate Desa based on selected Kecamatan
        $('#kecamatan_pernikahan').change(function() {
            var kecamatanId = $('#kecamatan_pernikahan option:selected').data('id');
            $('#desa_pernikahan').empty().append('<option value="">Pilih Desa</option>');
            $.get(`/api/desa/${kecamatanId}`, function(data) {
                $('#desa_pernikahan').append(data.map(function(desa) {
                    return `<option value="${desa.name}">${desa.name}</option>`;
                }));
            }).fail(function() {
                // Handle error
            });
        });
    });

</script>


</script>
@endpush
