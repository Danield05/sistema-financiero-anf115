@extends('layouts.app')

@section('title')
Inicio
@endsection

@section('content')
    <!-- Welcome Section -->
    <div class="welcome-section mb-4">
        <div class="row">
            <div class="col-12">
                <div class="card welcome-card border-0 shadow-sm" style="background: linear-gradient(135deg, #EC0000 0%, #b80000 100%); color: white;">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <h2 class="mb-2">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    ¡Bienvenido a SIFIN, {{ Auth::user()->name }}!
                                </h2>
                                <p class="mb-0 opacity-75">Sistema Integral Financero</p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <div class="welcome-icon">
                                    <i class="fas fa-building fa-5x" style="color: white;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-building text-primary fa-2x"></i>
                    </div>
                    <h3 class="stat-number text-primary mb-1">{{ \App\Models\empresa::count() }}</h3>
                    <p class="stat-label mb-0 text-muted">Empresas Registradas</p>
                </div>
            </div>
        </div>

        @if(auth()->user()->hasRole('Contador'))
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-calendar-alt text-info fa-2x"></i>
                    </div>
                    <h3 class="stat-number text-info mb-1">{{ \App\Models\Periodo::count() }}</h3>
                    <p class="stat-label mb-0 text-muted">Períodos Activos</p>
                </div>
            </div>
        </div>
        @else
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-users text-success fa-2x"></i>
                    </div>
                    <h3 class="stat-number text-success mb-1">{{ \App\Models\User::count() }}</h3>
                    <p class="stat-label mb-0 text-muted">Usuarios Activos</p>
                </div>
            </div>
        </div>
        @endif

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-chart-bar text-warning fa-2x"></i>
                    </div>
                    <h3 class="stat-number text-warning mb-1">{{ \App\Models\balance_general::count() }}</h3>
                    <p class="stat-label mb-0 text-muted">Balances Generados</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body text-center p-4">
                    <div class="stat-icon mb-3">
                        <i class="fas fa-file-invoice-dollar text-danger fa-2x"></i>
                    </div>
                    <h3 class="stat-number text-danger mb-1">{{ \App\Models\estado_resultado::count() }}</h3>
                    <p class="stat-label mb-0 text-muted">Estados de Resultados</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-bolt mr-2 text-warning"></i>
                        Acciones Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('empresa.index') }}" class="btn btn-outline-primary btn-block p-3 h-100 d-flex flex-column align-items-center">
                                <i class="fas fa-building fa-2x mb-2"></i>
                                <span>Gestionar Empresas</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('catalogo.index') }}" class="btn btn-outline-success btn-block p-3 h-100 d-flex flex-column align-items-center">
                                <i class="fas fa-list fa-2x mb-2"></i>
                                <span>Catálogo de Cuentas</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('balance_general.index') }}" class="btn btn-outline-warning btn-block p-3 h-100 d-flex flex-column align-items-center">
                                <i class="fas fa-balance-scale fa-2x mb-2"></i>
                                <span>Balances Generales</span>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <a href="{{ route('ratios.index') }}" class="btn btn-outline-danger btn-block p-3 h-100 d-flex flex-column align-items-center">
                                <i class="fas fa-chart-pie fa-2x mb-2"></i>
                                <span>Análisis de Ratios</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Overview -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-star mr-2"></i>
                        Capacidades del Sistema
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="feature-item d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mr-3 mt-1"></i>
                                <div>
                                    <h6 class="mb-1">Análisis Horizontal</h6>
                                    <p class="text-muted small mb-0">Comparación de estados financieros en diferentes períodos</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="feature-item d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mr-3 mt-1"></i>
                                <div>
                                    <h6 class="mb-1">Análisis Vertical</h6>
                                    <p class="text-muted small mb-0">Análisis porcentual de componentes financieros</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="feature-item d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mr-3 mt-1"></i>
                                <div>
                                    <h6 class="mb-1">Razones Financieras</h6>
                                    <p class="text-muted small mb-0">Cálculo automático de ratios de liquidez, rentabilidad y endeudamiento</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="feature-item d-flex align-items-start">
                                <i class="fas fa-check-circle text-success mr-3 mt-1"></i>
                                <div>
                                    <h6 class="mb-1">Gráficas Interactivas</h6>
                                    <p class="text-muted small mb-0">Visualización gráfica de cuentas y tendencias financieras</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-info-circle mr-2"></i>
                        Información del Sistema
                    </h5>
                </div>
                <div class="card-body">
                    <div class="system-info" style="color: black;">
                        <div class="info-item mb-3">
                            <strong>Versión:</strong> SIFIN v1.0
                        </div>
                        <div class="info-item mb-3">
                            <strong>Usuario:</strong> {{ Auth::user()->name }}
                        </div>
                        <div class="info-item mb-3">
                            <strong>Rol:</strong>
                            @foreach(Auth::user()->roles as $role)
                                <span class="badge badge-primary">{{ $role->name }}</span>
                            @endforeach
                        </div>
                        <div class="info-item mb-3">
                            <strong>Hora actual:</strong> <span id="current-time"></span>
                        </div>
                        <hr>
                        <div class="text-center">
                            <small class="text-muted">Sistema desarrollado por el equipo de SIFIN</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
<style>
.welcome-card {
    border-radius: 15px;
}

.stat-card {
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.stat-number {
    font-size: 2.5rem;
    font-weight: bold;
}

.stat-label {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.welcome-icon {
    opacity: 0.8;
}

.btn-outline-primary:hover, .btn-outline-success:hover, .btn-outline-warning:hover, .btn-outline-danger:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

.feature-item h6 {
    color: #495057;
}

.opacity-75 {
    opacity: 0.75;
}

.opacity-50 {
    opacity: 0.5;
}
</style>
@endsection

@section('scripts')
<script>
function updateTime() {
    const now = new Date();
    const day = String(now.getDate()).padStart(2, '0');
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const year = now.getFullYear();
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const timeString = `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`;
    document.getElementById('current-time').textContent = timeString;
}

// Update time immediately and then every second
updateTime();
setInterval(updateTime, 1000);
</script>
@endsection