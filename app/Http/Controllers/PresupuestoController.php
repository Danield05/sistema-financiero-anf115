<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Periodo;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::where('empresa_id', auth()->user()->empresa->id)->get();
        $periodos = Periodo::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('vistas.presupuestos.index', compact('presupuestos', 'periodos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos = Periodo::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('vistas.presupuestos.create', compact('periodos'));
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
            'tipo' => 'required|in:general,ventas,produccion,maestro',
            'periodo_id' => 'required|exists:periodos,id',
            'descripcion' => 'required|string',
            'monto_presupuestado' => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        Presupuesto::create([
            'tipo' => $request->tipo,
            'periodo_id' => $request->periodo_id,
            'empresa_id' => auth()->user()->empresa->id,
            'descripcion' => $request->descripcion,
            'monto_presupuestado' => $request->monto_presupuestado,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
        ]);

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto creado correctamente.');
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
        $presupuesto = Presupuesto::findOrFail($id);
        $periodos = Periodo::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('vistas.presupuestos.edit', compact('presupuesto', 'periodos'));
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
        $request->validate([
            'tipo' => 'required|in:general,ventas,produccion,maestro',
            'periodo_id' => 'required|exists:periodos,id',
            'descripcion' => 'required|string',
            'monto_presupuestado' => 'required|numeric|min:0',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->delete();

        return redirect()->route('presupuestos.index')->with('success', 'Presupuesto eliminado correctamente.');
    }
}
