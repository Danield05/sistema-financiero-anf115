<?php

namespace App\Http\Controllers;

use App\Models\balance_general;
use App\Models\cuenta;
use App\Models\cuenta_periodo;
use Illuminate\Http\Request;

class BalanceGeneralController extends Controller
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
        return view('vistas.analisis.balance_general');
    }

    public function crear($periodo_id)
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas = cuenta::all()->where('empresa_id',$empresa_id);
        $cuenta_p = cuenta_periodo::all()->where('periodo_id',$periodo_id);

        $cuentas_as = cuenta::all()->where('empresa_id',$empresa_id)->where('tipo','1');
        $cuentas_ds = cuenta::all()->where('empresa_id',$empresa_id)->where('tipo','0');
        $cuentas_pas = cuenta::all()->where('empresa_id',$empresa_id)->where('tipo','2');

        $cuentas_a = [];
        $cuentas_d = [];
        $cuentas_pa = [];

        foreach($cuentas_as as $cuenta_ass){
            if(cuenta_periodo::all()->where('cuenta_id',$cuenta_ass->id)->where('periodo_id',$periodo_id)->count() == 0){
                array_push($cuentas_a, $cuenta_ass);
            }
        }
        foreach($cuentas_ds as $cuenta_dss){
            if(cuenta_periodo::all()->where('cuenta_id',$cuenta_dss->id)->where('periodo_id',$periodo_id)->count() == 0){
                array_push($cuentas_d, $cuenta_dss);
            }
        }
        foreach($cuentas_pas as $cuenta_pass){
            if(cuenta_periodo::all()->where('cuenta_id',$cuenta_pass->id)->where('periodo_id',$periodo_id)->count() == 0){
                array_push($cuentas_pa, $cuenta_pass);
            }
        }

        $deudora = 0;
        $acredora = 0;
        $patrimonio = 0;

        foreach($cuenta_p as $cuenta){
            if($cuenta->cuenta->tipo == 0){
                $deudora += $cuenta->total;
            }
            else if($cuenta->cuenta->tipo == 1){
                $acredora += $cuenta->total;
            }
            else if($cuenta->cuenta->tipo == 2){
                $patrimonio += $cuenta->total;
            }
        }

        $pasivo_patrimonio = $deudora + $patrimonio;

        // return response()->json($cuenta_p);
        return view('vistas.analisis.balance_general',compact('periodo_id', 'cuentas_a', 'cuentas_d', 'cuenta_p', 'cuentas_pa', 'deudora', 'acredora', 'patrimonio', 'pasivo_patrimonio'));
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
            'activo' =>'required',
            'pasivo' =>'required',
            'patrimonio' =>'required',
        ]);

        $input = $request->except('_token');
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;

        $consulta = balance_general::all()->where('empresa_id',$empresa_id)->where('periodo_id', $request->get('periodo_id'))->first();

        if($consulta == null){
            balance_general::create($input);

            return back();
            // return redirect()->route('periodo.index');
        }

        if($consulta->count() > 0){
            
            $consulta->update($input);
            return back();
            
            // return redirect()->route('periodo.index');

            // return response()->json($consulta[0]->id);
            // balance_general::destroy($consulta->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\balance_general  $balance_general
     * @return \Illuminate\Http\Response
     */
    public function show(balance_general $balance_general)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\balance_general  $balance_general
     * @return \Illuminate\Http\Response
     */
    public function edit(balance_general $balance_general)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\balance_general  $balance_general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, balance_general $balance_general)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\balance_general  $balance_general
     * @return \Illuminate\Http\Response
     */
    public function destroy(balance_general $balance_general)
    {
        //
    }
}
