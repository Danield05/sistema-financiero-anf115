<?php

namespace App\Http\Controllers;

use App\Models\BalanceGeneral;
use App\Models\estado_resultado;
use App\Models\Periodo;
use Illuminate\Http\Request;

class ProyeccionController extends Controller
{
    public function index()
    {
        $periodos = Periodo::where('empresa_id', auth()->user()->empresa->id)->orderBy('anio', 'desc')->get();
        $proyecciones = [];

        if ($periodos->count() >= 2) {
            // Proyección simple basada en crecimiento promedio
            $ultimo_periodo = $periodos->first();
            $penultimo_periodo = $periodos->skip(1)->first();

            $balance_ultimo = BalanceGeneral::where('periodo_id', $ultimo_periodo->id)->first();
            $balance_penultimo = BalanceGeneral::where('periodo_id', $penultimo_periodo->id)->first();

            $estado_ultimo = estado_resultado::where('periodo_id', $ultimo_periodo->id)->first();
            $estado_penultimo = estado_resultado::where('periodo_id', $penultimo_periodo->id)->first();

            if ($balance_ultimo && $balance_penultimo && $estado_ultimo && $estado_penultimo) {
                $crecimiento_ventas = $estado_penultimo->ventas != 0 ? ($estado_ultimo->ventas - $estado_penultimo->ventas) / $estado_penultimo->ventas : 0;
                $crecimiento_activos = $balance_penultimo->activo != 0 ? ($balance_ultimo->activo - $balance_penultimo->activo) / $balance_penultimo->activo : 0;

                for ($i = 1; $i <= 3; $i++) {
                    $anio_proyeccion = $ultimo_periodo->anio + $i;
                    $ventas_proyectadas = $estado_ultimo->ventas * pow(1 + $crecimiento_ventas, $i);
                    $activos_proyectados = $balance_ultimo->activo * pow(1 + $crecimiento_activos, $i);

                    $proyecciones[] = [
                        'anio' => $anio_proyeccion,
                        'ventas_proyectadas' => $ventas_proyectadas,
                        'activos_proyectados' => $activos_proyectados,
                    ];
                }
            }
        }

        return view('vistas.proyecciones.index', compact('proyecciones'));
    }
}
