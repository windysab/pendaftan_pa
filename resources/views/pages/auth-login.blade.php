@extends('layouts.auth')

@section('title', 'Login')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .password-container {
            position: relative;
        }
        .password-container input[type="password"],
        .password-container input[type="text"] {
            padding-right: 30px;
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>
@endpush

@section('main')
<div class="card card-primary">
    <div class="card-header">
        <h4>Login</h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                    Silakan isi username Anda
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                        <a href="#" class="text-small">
                            Lupa Password?
                        </a>
                    </div>
                </div>
                <div class="password-container">
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                </div>
                <div class="invalid-feedback">
                    Silakan isi password Anda
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                    <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
<div class="text-muted mt-5 text-center">
    Belum punya akun? <a href="auth-register">Buat Satu</a>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <!-- Page Specific JS File -->
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var toggleIcon = document.querySelector('.toggle-password');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
@endpush
