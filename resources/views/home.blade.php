@extends('layouts.app')

@section('title')
Inicio
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Inicio</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                            <p>EconoScope tiene por objetivo emitir informes de análisis financieros de empresa. Este sistema podrá emitir informes de:</p>
                            <ul>
                                <li>Análisis horizontal</li>
                                <li>Análisis vertical</li>
                                {{-- <li>Estado de fuentes y usos</li> --}}
                                <li>Razones financieras</li>
                                <li>Gráficas de cuentas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection