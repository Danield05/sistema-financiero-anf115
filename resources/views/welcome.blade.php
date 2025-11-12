@extends('layouts.app')

@section('title')
Bienvenido
@endsection

@section('content')
    <!-- Hero Section -->
    <div class="hero-section text-white py-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 50%, #000000 100%); min-height: 60vh;">
        <div class="container text-center">
            <div class="row align-items-center">
                <div class="col-lg-8 mx-auto">
                    <div class="hero-content">
                        <div class="mb-4">
                            <i class="fas fa-chart-line fa-4x text-warning mb-3"></i>
                        </div>
                        <h1 class="display-4 font-weight-bold mb-3">SIFIN</h1>
                        <p class="lead mb-4">Sistema Financiero Integrado</p>
                        <div class="hero-features d-flex justify-content-center flex-wrap mb-4">
                            <div class="feature-item mx-3 mb-2">
                                <i class="fas fa-balance-scale text-danger"></i>
                                <span class="ml-2">Balances</span>
                            </div>
                            <div class="feature-item mx-3 mb-2">
                                <i class="fas fa-chart-bar text-warning"></i>
                                <span class="ml-2">Análisis</span>
                            </div>
                            <div class="feature-item mx-3 mb-2">
                                <i class="fas fa-file-invoice-dollar text-danger"></i>
                                <span class="ml-2">Reportes</span>
                            </div>
                        </div>
                        <i class="fas fa-coins" style="font-size: 6rem; color: #fd7e14; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);" alt="SIFIN Logo"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Section -->
    <section class="team-section py-5" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="section-title font-weight-bold text-danger">Nuestro Equipo</h2>
                    <p class="text-muted">Los desarrolladores detrás de SIFIN</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Team Member 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card team-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="team-avatar mb-3">
                                <div class="avatar-circle bg-danger text-white d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%; font-size: 2rem;">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                            </div>
                            <h5 class="card-title font-weight-bold mb-1">Jose Daniel</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Aquino Cortez</h6>
                            <span class="badge badge-primary px-3 py-2">AC21051</span>
                        </div>
                    </div>
                </div>
                <!-- Team Member 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card team-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="team-avatar mb-3">
                                <div class="avatar-circle bg-warning text-white d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%; font-size: 2rem;">
                                    <i class="fas fa-calculator"></i>
                                </div>
                            </div>
                            <h5 class="card-title font-weight-bold mb-1">Angel Adan</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Carranza Lopez</h6>
                            <span class="badge badge-warning px-3 py-2">CL19037</span>
                        </div>
                    </div>
                </div>
                <!-- Team Member 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card team-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="team-avatar mb-3">
                                <div class="avatar-circle bg-danger text-white d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%; font-size: 2rem;">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <h5 class="card-title font-weight-bold mb-1">Hugo Alejandro</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Garcia Alfaro</h6>
                            <span class="badge badge-danger px-3 py-2">GD15026</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section py-4 bg-dark text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="stat-item">
                        <i class="fas fa-users fa-2x mb-2 text-danger"></i>
                        <h4 class="font-weight-bold">3</h4>
                        <p class="mb-0">Miembros del Equipo</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-item">
                        <i class="fas fa-project-diagram fa-2x mb-2 text-warning"></i>
                        <h4 class="font-weight-bold">1</h4>
                        <p class="mb-0">Proyecto Financiero</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-item">
                        <i class="fab fa-php fa-2x mb-2 text-primary"></i>
                        <h4 class="font-weight-bold">PHP</h4>
                        <p class="mb-0">Backend</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="stat-item">
                        <i class="fab fa-js-square fa-2x mb-2 text-warning"></i>
                        <h4 class="font-weight-bold">JavaScript</h4>
                        <p class="mb-0">Frontend</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
<style>
.hero-section {
    position: relative;
    overflow: hidden;
    animation: fadeInUp 1s ease-out;
}
.hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="%23ffffff" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="%23ffffff" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    pointer-events: none;
}
.hero-content {
    animation: slideInFromBottom 1.2s ease-out 0.3s both;
}
.display-4 {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    font-family: 'Lato', sans-serif;
}
.lead {
    font-size: 1.25rem;
    opacity: 0.9;
}
.feature-item {
    display: flex;
    align-items: center;
    font-weight: 500;
    background: rgba(255,255,255,0.1);
    padding: 10px 20px;
    border-radius: 25px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    transition: all 0.3s ease;
}
.feature-item:hover {
    transform: translateY(-2px);
    background: rgba(255,255,255,0.2);
}
.team-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
}
.team-card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}
.team-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
}
.avatar-circle {
    transition: all 0.3s ease;
}
.team-card:hover .avatar-circle {
    transform: scale(1.1);
    box-shadow: 0 10px 20px rgba(0,0,0,0.3);
}
.card-title {
    color: #2c3e50;
}
.card-subtitle {
    color: #7f8c8d;
}
.badge {
    font-size: 0.8rem;
    letter-spacing: 1px;
}
.section-title {
    position: relative;
    display: inline-block;
    animation: fadeIn 1s ease-out;
}
.section-title::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #dc3545, #fd7e14);
    border-radius: 2px;
    animation: growWidth 1s ease-out 0.5s both;
}
.stats-section {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    position: relative;
}
.stats-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="stats-pattern" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23ffffff" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23stats-pattern)"/></svg>');
}
.stat-item {
    position: relative;
    z-index: 1;
    animation: fadeInUp 1s ease-out;
}
.stat-item:nth-child(1) { animation-delay: 0.1s; }
.stat-item:nth-child(2) { animation-delay: 0.2s; }
.stat-item:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes slideInFromBottom {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes growWidth {
    from { width: 0; }
    to { width: 50px; }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    .hero-section {
        min-height: 50vh;
        padding: 3rem 0;
    }
    .feature-item {
        margin: 0.5rem;
        padding: 8px 16px;
        font-size: 0.9rem;
    }
    .team-card {
        margin-bottom: 2rem;
    }
}
</style>
@endsection