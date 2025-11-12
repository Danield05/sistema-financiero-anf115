@extends('layouts.auth_app')
@section('title')
    Recuperar Contraseña
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #1a1919 0%, #3b3939 100%) !important;
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
                            <i class="fas fa-key fa-6x text-warning"></i>
                        </div>
                        <h1 class="display-4 font-weight-bold mb-3">Recuperar Contraseña</h1>
                        <h3 class="mb-4">Sistema Financiero Integrado</h3>
                        <p class="lead mb-4">Ingresa tu correo electrónico para recibir un enlace de recuperación</p>
                        <div class="features-list">
                            <div class="feature-item mb-3">
                                <i class="fas fa-shield-alt text-success mr-3"></i>
                                <span>Proceso Seguro</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-clock text-info mr-3"></i>
                                <span>Rápido y Fácil</span>
                            </div>
                            <div class="feature-item mb-3">
                                <i class="fas fa-envelope text-warning mr-3"></i>
                                <span>Verificación por Email</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Reset Form -->
                <div class="col-lg-6 d-flex align-items-center justify-content-center p-5" style="background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
                    <div class="login-form-container w-100" style="max-width: 400px;">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <i class="fas fa-key fa-3x text-warning"></i>
                            </div>
                            <h2 class="font-weight-bold text-primary mb-2">Recuperar Contraseña</h2>
                            <p class="text-muted">Ingresa tu correo electrónico</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success border-0 shadow-sm">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}" class="login-form">
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
                                           value="{{ old('email') }}" required autofocus>
                                </div>
                                @error('email')
                                    <small class="text-danger mt-1">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold py-3 mb-3">
                                <i class="fas fa-paper-plane mr-2"></i>Enviar Enlace de Recuperación
                            </button>
                        </form>

                        <div class="text-center">
                            <div class="mb-3">
                                <a href="{{ url('/') }}" class="btn btn-outline-primary mr-2">
                                    <i class="fas fa-home mr-1"></i>Volver al Inicio
                                </a>
                            </div>
                            <p class="text-muted mb-0">¿Recordaste tu contraseña?</p>
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
