<?php

namespace App\Http\Controllers;

use App\Models\BalanceGeneral;
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
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $periodos = \App\Models\periodo::where('empresa_id', $empresa_id)->get();
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
        return view('vistas.analisis.balance_general');
    }

    public function crear($periodo_id)
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas = cuenta::where('empresa_id',$empresa_id)->get();
        $cuenta_p = cuenta_periodo::where('periodo_id',$periodo_id)->get();

        $cuentas_as = cuenta::where('empresa_id',$empresa_id)->where('tipo','1')->get();
        $cuentas_ds = cuenta::where('empresa_id',$empresa_id)->where('tipo','0')->get();
        $cuentas_pas = cuenta::where('empresa_id',$empresa_id)->where('tipo','2')->get();

        $cuentas_a = [];
        $cuentas_d = [];
        $cuentas_pa = [];

        foreach($cuentas_as as $cuenta_ass){
            if(cuenta_periodo::where('cuenta_id',$cuenta_ass->id)->where('periodo_id',$periodo_id)->count() == 0){
                array_push($cuentas_a, $cuenta_ass);
            }
        }
        foreach($cuentas_ds as $cuenta_dss){
            if(cuenta_periodo::where('cuenta_id',$cuenta_dss->id)->where('periodo_id',$periodo_id)->count() == 0){
                array_push($cuentas_d, $cuenta_dss);
            }
        }
        foreach($cuentas_pas as $cuenta_pass){
            if(cuenta_periodo::where('cuenta_id',$cuenta_pass->id)->where('periodo_id',$periodo_id)->count() == 0){
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

        $consulta = BalanceGeneral::where('empresa_id',$empresa_id)->where('periodo_id', $request->get('periodo_id'))->first();

        if($consulta == null){
            BalanceGeneral::create($input);
        } else {
            $consulta->update($input);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BalanceGeneral  $BalanceGeneral
     * @return \Illuminate\Http\Response
     */
    public function show(BalanceGeneral $BalanceGeneral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BalanceGeneral  $BalanceGeneral
     * @return \Illuminate\Http\Response
     */
    public function edit(BalanceGeneral $BalanceGeneral)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BalanceGeneral  $BalanceGeneral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BalanceGeneral $BalanceGeneral)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BalanceGeneral  $BalanceGeneral
     * @return \Illuminate\Http\Response
     */
    public function destroy(BalanceGeneral $BalanceGeneral)
    {
        //
    }
}
