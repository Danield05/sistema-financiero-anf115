<?php

namespace App\Http\Controllers;

use App\Models\estado_resultado;
use Illuminate\Http\Request;

class EstadoResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function crear($periodo_id){

        // $id_periodo = $periodo_id;
        // return response()->json($id_periodo);

        $estado_resultado = estado_resultado::all()->where('periodo_id', $periodo_id)->first();
        if($estado_resultado == null){
            return view('vistas.analisis.estado_resultado', compact('estado_resultado', 'periodo_id'));
        }

        $ventas_netas = $estado_resultado->ventas - $estado_resultado->devolucion_sobre_ventas;

        $utilidad_bruta = $ventas_netas - $estado_resultado->costo_de_ventas;

        $utilidad_operativa = $utilidad_bruta - $estado_resultado->gastos_de_operacion;

        $utilidad_antes_de_impuesto = $utilidad_operativa + $estado_resultado->otros_ingresos - $estado_resultado->gastos_no_operativos;

        $utilidad_neta = $utilidad_antes_de_impuesto - $estado_resultado->impuestos_sobre_la_renta;

        return view('vistas.analisis.estado_resultado', compact('estado_resultado', 'ventas_netas', 'utilidad_bruta', 'utilidad_operativa', 'utilidad_antes_de_impuesto', 'utilidad_neta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // * Validacion
        $this->validate($request, [
            'ventas'=>'required',
            'costo_de_ventas' => 'required',
            'devolucion_sobre_ventas'=>'required',
            'gastos_de_operacion'=>'required',
            'otros_ingresos'=>'required',
            'gastos_no_operativos'=>'required',
            'impuestos_sobre_la_renta'=>'required',
        ]);
        
        $input = $request->except('_token', '');

        $consulta = estado_resultado::all()->where('periodo_id', $request->get('periodo_id'))->first();

        if($consulta == null){
            estado_resultado::create($input);
            return back();
            // return redirect()->route('periodo.index');
        }

        if($consulta->count() > 0){
            $consulta->update($input);
            return back();
            // return redirect()->route('periodo.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estado_resultado  $estado_resultado
     * @return \Illuminate\Http\Response
     */
    public function show(estado_resultado $estado_resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estado_resultado  $estado_resultado
     * @return \Illuminate\Http\Response
     */
    public function edit(estado_resultado $estado_resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estado_resultado  $estado_resultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estado_resultado $estado_resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estado_resultado  $estado_resultado
     * @return \Illuminate\Http\Response
     */
    public function destroy(estado_resultado $estado_resultado)
    {
        //
    }
}
