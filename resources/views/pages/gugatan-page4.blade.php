@extends('layouts.app')

@section('title', 'Gugatan - Data Tambahan')

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
                    <div class="breadcrumb-item">Form</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Formulir Gugatan - Data Tambahan</h2>
                <p class="section-lead">
                    Silahkan isi data tambahan dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Data Tambahan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="alasan_gugatan">Alasan Gugatan</label>
                                        <textarea id="alasan_gugatan" name="alasan_gugatan" class="form-control" data-height="150" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="bukti_gugatan">Bukti Gugatan</label>
                                        <textarea id="bukti_gugatan" name="bukti_gugatan" class="form-control" data-height="150" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="saksi_gugatan">Saksi Gugatan</label>
                                        <textarea id="saksi_gugatan" name="saksi_gugatan" class="form-control" data-height="150" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
