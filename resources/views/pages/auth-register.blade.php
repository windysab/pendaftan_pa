@extends('layouts.auth')

@section('title', 'Register')

@push('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
<style>
    .form-container {
        max-width: 500px;
        margin: auto;
    }
</style>
@endpush

@section('main')
<div class="card card-primary form-container">
    <div class="card-header">
        <h4>Register</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Silakan isi username Anda
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="2" required>
                <div class="invalid-feedback">
                    Silakan isi email Anda
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control" name="password" tabindex="3" required>
                <div class="invalid-feedback">
                    Silakan isi password Anda
                </div>
            </div>

            <div class="form-group">
                <label for="password_confirmation" class="control-label">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" tabindex="4" required>
                <div class="invalid-feedback">
                    Silakan konfirmasi password Anda
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="5">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
<div class="text-muted mt-5 text-center">
    Sudah punya akun? <a href="{{ route('login') }}">Login</a>
</div>
@endsection

@push('scripts')
<!-- JS Libraies -->

<!-- Page Specific JS File -->
@endpush
