@extends('layouts.auth_app')
@section('title')
    Register
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #292828 0%, #302f2f 100%) !important;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
    </style>
@endsection

@section('content')
    <div class="login-wrapper">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <!-- Left Side - Branding -->
                <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center text-white p-5" style="background: linear-gradient(135deg, #EC0000 0%, #b80000 100%);">
                    <div class="branding-content text-center">
                        <div class="mb-4">
                            <i class="fas fa-user-plus fa-6x text-warning"></i>
                        </div>
                        <h1 class="display-4 font-weight-bold mb-3">Únete a SIFIN</h1>
                        <h3 class="mb-4">Sistema Financiero Integrado</h3>
                        <p class="lead mb-4">Regístrate y comienza a gestionar tus finanzas de manera inteligente</p>
                        <div class="features-list">
                            <div class="feature-item mb-3">
                                <i class="fas fa-user-shield text-success mr-3"></i>
                                <span>Cuenta Segura</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-chart-pie text-info mr-3"></i>
                                <span>Reportes Personalizados</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-clock text-warning mr-3"></i>
                                <span>Acceso 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Register Form -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center p-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
                    <div class="login-form-container w-100" style="max-width: 500px;">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-user-plus fa-3x text-warning"></i>
                            </div>
                            <h2 class="font-weight-bold text-primary mb-2">Crear Cuenta</h2>
                            <p class="text-muted">Completa tus datos para registrarte</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger border-0 shadow-sm">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="login-form">
                            @csrf

                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-0">
                                            <i class="fas fa-user text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg border-left-0"
                                           id="name" name="name" placeholder="Nombre completo"
                                           value="{{ old('name') }}" required autofocus>
                                </div>
                                @error('name')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-0">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg border-left-0"
                                           id="email" name="email" placeholder="Correo electrónico"
                                           value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-0" id="togglePassword" style="cursor: pointer;">
                                                    <i class="fas fa-lock text-primary" id="lockIcon"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0"
                                                   id="password" name="password" placeholder="Contraseña" required>
                                        </div>
                                        @error('password')
                                            <small class="text-danger mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-0" id="togglePasswordConfirm" style="cursor: pointer;">
                                                    <i class="fas fa-lock text-primary" id="lockIconConfirm"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control form-control-lg border-left-0"
                                                   id="password_confirmation" name="password_confirmation"
                                                   placeholder="Confirmar contraseña" required>
                                        </div>
                                        @error('password_confirmation')
                                            <small class="text-danger mt-1">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold py-3 mb-3">
                                <i class="fas fa-user-plus mr-2"></i>Crear Cuenta
                            </button>
                        </form>

                        <div class="text-center">
                            <div class="mb-3">
                                <a href="{{ url('/') }}" class="btn btn-outline-primary mr-2">
                                    <i class="fas fa-home mr-1"></i>Volver al Inicio
                                </a>
                            </div>
                            <p class="text-muted mb-0">¿Ya tienes cuenta?</p>
                            <a href="{{ route('login') }}" class="text-primary font-weight-bold">
                                Inicia sesión aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Toggle for password field
        $('#togglePassword').on('click', function(e) {
            e.preventDefault();
            const passwordField = $('#password');
            const lockIcon = $('#lockIcon');

            if (passwordField.attr('type') === 'password') {
                passwordField.attr('type', 'text');
                lockIcon.removeClass('fa-lock').addClass('fa-unlock');
            } else {
                passwordField.attr('type', 'password');
                lockIcon.removeClass('fa-unlock').addClass('fa-lock');
            }
        });

        // Toggle for password confirmation field
        $('#togglePasswordConfirm').on('click', function(e) {
            e.preventDefault();
            const passwordConfirmField = $('#password_confirmation');
            const lockIconConfirm = $('#lockIconConfirm');

            if (passwordConfirmField.attr('type') === 'password') {
                passwordConfirmField.attr('type', 'text');
                lockIconConfirm.removeClass('fa-lock').addClass('fa-unlock');
            } else {
                passwordConfirmField.attr('type', 'password');
                lockIconConfirm.removeClass('fa-unlock').addClass('fa-lock');
            }
        });
    });
</script>
@endsection
