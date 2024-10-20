@extends('layouts.app')

@section('title', 'Gugatan - Sukses')

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
                    <div class="breadcrumb-item">Sukses</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Gugatan Berhasil Disimpan</h2>
                <p class="section-lead">
                    Terima kasih, data gugatan Anda telah berhasil disimpan.
                </p>

                <div class="layout-container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Gugatan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($gugatan->toArray() as $key => $value)
                                            @if(!empty($value))
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}</strong></label>
                                                        <p>{{ $value }}</p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('gugatan.generateWord', $gugatan->id) }}" class="btn btn-primary">Download Word</a>
                                            <button onclick="printDocument()" class="btn btn-secondary">Cetak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <!-- Tambahkan konten tambahan di sini -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Informasi Tambahan</h4>
                                </div>
                                <div class="card-body">
                                    <p>Anda dapat menambahkan informasi tambahan di sini.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{-- @push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->

    <script>
        function printDocument() {
            // URL file yang akan dicetak
            var fileUrl = "{{ route('gugatan.generateWord', $gugatan->id) }}";

            // Membuka file di tab baru
            var win = window.open(fileUrl, '_blank');
            if (!win) {
                alert('Pop-up blocked. Please allow pop-ups for this website.');
                return;
            }
            win.focus();

            // Memicu dialog cetak setelah file terbuka
            win.onload = function() {
                win.print();
            };

            // Penanganan kesalahan jika file tidak dapat dimuat
            win.onerror = function() {
                alert('Failed to load the document. Please try again.');
            };
        }
    </script>
@endpush --}}
@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->

    <script>
        function printDocument() {
            // URL file yang akan dicetak
            var fileUrl = "{{ route('gugatan.generateWord', $gugatan->id) }}";

            // Membuka file di tab baru
            var win = window.open(fileUrl, '_blank');
            if (!win) {
                alert('Pop-up blocked. Please allow pop-ups for this website.');
                return;
            }
            win.focus();

            // Memicu dialog cetak setelah file terbuka dengan penundaan
            win.onload = function() {
                setTimeout(function() {
                    win.print();
                }, 1000); // Penundaan 1 detik
            };

            // Penanganan kesalahan jika file tidak dapat dimuat
            win.onerror = function() {
                alert('Failed to load the document. Please try again.');
            };
        }
    </script>
@endpush
