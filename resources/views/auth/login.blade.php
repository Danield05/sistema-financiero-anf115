@extends('layouts.auth_app')
@section('title')
    Admin Login
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login-wrapper">
        <div class="container-fluid">
            <div class="row min-vh-100">
                <!-- Left Side - Branding -->
                <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center text-white p-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #000000 100%);">
                    <div class="branding-content text-center">
                        <div class="mb-4">
                            <i class="fas fa-coins fa-6x text-warning"></i>
                        </div>
                        <h1 class="display-4 font-weight-bold mb-3">SIFIN</h1>
                        <h3 class="mb-4">Sistema Financiero Integrado</h3>
                        <p class="lead mb-4">Tu plataforma confiable para la gestión financiera integral</p>
                        <div class="features-list">
                            <div class="feature-item mb-3">
                                <i class="fas fa-shield-alt text-success mr-3"></i>
                                <span>Seguridad Avanzada</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-chart-line text-info mr-3"></i>
                                <span>Análisis en Tiempo Real</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-users text-warning mr-3"></i>
                                <span>Soporte 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Login Form -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center p-5" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                    <div class="login-form-container w-100" style="max-width: 400px;">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-coins fa-3x text-warning"></i>
                            </div>
                            <h2 class="font-weight-bold text-primary mb-2">Bienvenido a SIFIN</h2>
                            <p class="text-muted">Ingresa tus credenciales para continuar</p>
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

                        <form method="POST" action="{{ route('login') }}" class="login-form">
                            @csrf

                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-0">
                                            <i class="fas fa-envelope text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control form-control-lg border-left-0"
                                           id="email" name="email" placeholder="Correo electrónico"
                                           value="{{ (Cookie::get('email') !== null) ? Cookie::get('email') : old('email') }}"
                                           required autofocus>
                                </div>
                                @error('email')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light border-0">
                                            <i class="fas fa-lock text-primary"></i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg border-left-0"
                                           id="password" name="password" placeholder="Contraseña"
                                           value="{{ (Cookie::get('password') !== null) ? Cookie::get('password') : null }}"
                                           required>
                                </div>
                                @error('password')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember"
                                           {{ (Cookie::get('remember') !== null) ? 'checked' : '' }}>
                                    <label class="custom-control-label text-muted" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-primary font-weight-bold">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold py-3 mb-3">
                                <i class="fas fa-sign-in-alt mr-2"></i>Iniciar Sesión
                            </button>
                        </form>

                        <div class="text-center">
                            <div class="mb-3">
                                <a href="{{ url('/') }}" class="btn btn-outline-primary mr-2">
                                    <i class="fas fa-home mr-1"></i>Volver al Inicio
                                </a>
                            </div>
                            <p class="text-muted mb-0">¿No tienes cuenta?</p>
                            <a href="{{ route('register') }}" class="text-primary font-weight-bold">
                                Regístrate aquí
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
