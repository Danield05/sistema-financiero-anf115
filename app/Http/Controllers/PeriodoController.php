<?php

namespace App\Http\Controllers;

use App\Models\periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $periodos = periodo::all()->where('empresa_id',$empresa_id);
        $bandera = null;
        return view('vistas.recursos.periodos', compact('periodos', 'bandera'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'anio' =>'required|',
        ]);

        $input = $request->except('_token');
        periodo::create($input);
        return redirect()->route('periodo.index');
    }

    public function guardar(Request $request)
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $input = [
            'anio' => periodo::all()->where('empresa_id', $empresa_id)->max('anio')+1,
            'empresa_id' => $empresa_id
        ];
        periodo::create($input);
        return redirect()->route('periodo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(periodo $periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, periodo $periodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $anios = periodo::all()->where('empresa_id', $empresa_id);
        $anio_max = 0;

        foreach($anios as $anio){
            if($anio->anio > $anio_max){
                $anio_max = $anio->anio;
            }
        }

        // return response()->json($anio_max);
        if($anio_max == periodo::find($id)->anio){
            periodo::find($id)->delete();
            return redirect()->route('periodo.index');
        }

        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $periodos = periodo::all()->where('empresa_id',$empresa_id);
        $bandera =  'Solo puede eliminar el ultimo periodo de la empresa';

        return view('vistas.recursos.periodos', compact('periodos', 'bandera'));
    }
}