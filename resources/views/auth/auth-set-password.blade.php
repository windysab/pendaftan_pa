@extends('layouts.auth')

@section('title', 'Set New Password')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Set New Password</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email"
                        type="email"
                        class="form-control"
                        name="email"
                        tabindex="1"
                        required
                        autofocus>
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <div class="password-container">
                        <input id="password"
                            type="password"
                            class="form-control"
                            name="password"
                            tabindex="2"
                            required>
                        <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                    </div>
                    <div class="invalid-feedback">
                        Password harus minimal 8 karakter
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <div class="password-container">
                        <input id="password-confirm"
                            type="password"
                            class="form-control"
                            name="password_confirmation"
                            tabindex="3"
                            required>
                        <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility()"></i>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit"
                        class="btn btn-primary btn-lg btn-block"
                        tabindex="4">
                        Set New Password
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <!-- Page Specific JS File -->
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var passwordConfirmField = document.getElementById('password-confirm');
            var toggleIcons = document.querySelectorAll('.toggle-password');
            toggleIcons.forEach(icon => {
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    passwordConfirmField.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    passwordConfirmField.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        }
    </script>
@endpush
