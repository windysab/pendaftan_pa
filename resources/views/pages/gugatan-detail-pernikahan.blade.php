@extends('layouts.app')

@section('title', 'Detail Pernikahan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>DETAIL PERNIKAHAN</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Formulir</a></div>
                    <div class="breadcrumb-item">Detail Pernikahan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Detail Pernikahan</h2>
                <p class="section-lead">
                    Silahkan isi detail pernikahan dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
                </p>

                <form method="POST" action="{{ route('gugatan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center-custom">Detail Pernikahan</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Add your form fields here -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
