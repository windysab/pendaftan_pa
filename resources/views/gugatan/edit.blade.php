@extends('layouts.app')

@section('title', 'Edit Gugatan')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Gugatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Gugatan</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Formulir Gugatan</h2>
            <p class="section-lead">
                Silahkan isi data gugatan dibawah ini. Pastikan data yang anda masukkan benar. Terima kasih.
            </p>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form method="POST" action="{{ route('gugatan.update', $gugatan->id) }}">
                @csrf
                @method('PUT')
                @include('pages.gugatan-form')
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
