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
            'periodo' => 'required|string',
        ]);

        $empleado = Empleado::find($request->empleado_id);
        $salario_base = $empleado->salario_base;

        $afp = PlanillaSueldo::calcularAFP($salario_base);
        $iss = PlanillaSueldo::calcularISSS($salario_base);
        $renta = PlanillaSueldo::calcularRenta($salario_base);
        $aguinaldo = PlanillaSueldo::calcularAguinaldo($salario_base);
        $vacaciones = PlanillaSueldo::calcularVacaciones($salario_base);

        $total_deducciones = $afp + $iss + $renta;
        $sueldo_neto = $salario_base - $total_deducciones + $aguinaldo + $vacaciones;

        PlanillaSueldo::create([
            'empleado_id' => $request->empleado_id,
            'periodo' => $request->periodo,
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
