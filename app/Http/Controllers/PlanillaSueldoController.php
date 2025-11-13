<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\PlanillaSueldo;
use Illuminate\Http\Request;

class PlanillaSueldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planillas = PlanillaSueldo::with('empleado')->whereHas('empleado', function($q) {
            $q->where('empresa_id', auth()->user()->empresa->id);
        })->get();
        return view('vistas.planillas.index', compact('planillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('vistas.planillas.create', compact('empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'empleado_id' => 'required|exists:empleados,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'dias_laborados' => 'required|integer|min:0|max:31',
            'dias_faltados_con_permiso' => 'nullable|integer|min:0|max:31',
            'dias_faltados_sin_permiso' => 'nullable|integer|min:0|max:31',
        ]);

        $empleado = Empleado::find($request->empleado_id);
        $salario_base_mensual = $empleado->salario_base;

        // Calcular días totales del período
        $fecha_inicio = \Carbon\Carbon::parse($request->fecha_inicio);
        $fecha_fin = \Carbon\Carbon::parse($request->fecha_fin);
        $dias_totales_periodo = $fecha_inicio->diffInDays($fecha_fin) + 1;

        // Calcular salario base prorrateado por días trabajados
        $dias_faltados_sin_permiso = $request->dias_faltados_sin_permiso ?? 0;
        $dias_efectivos_trabajados = $request->dias_laborados - $dias_faltados_sin_permiso;

        // Salario diario
        $salario_diario = $salario_base_mensual / 30; // Asumiendo mes de 30 días

        // Salario base prorrateado
        $salario_base = $salario_diario * $dias_efectivos_trabajados;

        // Calcular deducciones sobre el salario prorrateado
        $afp = PlanillaSueldo::calcularAFP($salario_base);
        $iss = PlanillaSueldo::calcularISSS($salario_base);
        $renta = PlanillaSueldo::calcularRenta($salario_base);

        // Aguinaldo y vacaciones prorrateados
        $aguinaldo = PlanillaSueldo::calcularAguinaldo($salario_base, $dias_totales_periodo / 30);
        $vacaciones = PlanillaSueldo::calcularVacaciones($salario_base, ($dias_totales_periodo / 30) * (15/12)); // 15 días de vacaciones al año

        $total_deducciones = $afp + $iss + $renta;
        $sueldo_neto = $salario_base - $total_deducciones + $aguinaldo + $vacaciones;

        PlanillaSueldo::create([
            'empleado_id' => $request->empleado_id,
            'periodo' => $fecha_inicio->format('Y-m'),
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'dias_laborados' => $request->dias_laborados,
            'dias_faltados_con_permiso' => $request->dias_faltados_con_permiso ?? 0,
            'dias_faltados_sin_permiso' => $request->dias_faltados_sin_permiso ?? 0,
            'salario_base' => $salario_base,
            'afp_empleado' => $afp,
            'iss_empleado' => $iss,
            'renta' => $renta,
            'aguinaldo' => $aguinaldo,
            'vacaciones' => $vacaciones,
            'total_deducciones' => $total_deducciones,
            'sueldo_neto' => $sueldo_neto,
        ]);

        return redirect()->route('planillas.index')->with('success', 'Planilla generada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planilla = PlanillaSueldo::findOrFail($id);
        $planilla->delete();

        return redirect()->route('planillas.index')->with('success', 'Planilla eliminada correctamente.');
    }
}
