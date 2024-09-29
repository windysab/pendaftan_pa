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
                    <div class="left-column">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Gugatan</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach($gugatan->toArray() as $key => $value)
                                            <tr>
                                                <th>{{ ucfirst(str_replace('_', ' ', $key)) }}</th>
                                                <td>{{ $value }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right-column">
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
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <!-- Page Specific JS File -->
@endpush
