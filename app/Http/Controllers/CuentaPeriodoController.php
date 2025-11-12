<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use App\Models\cuenta_periodo;
use Illuminate\Http\Request;

class CuentaPeriodoController extends Controller
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
            'total' =>'required',
        ]);

        $input = $request->except('_token');

        // * Validacion que no exista otro igual
        $cuentas = cuenta_periodo::all()->where('cuenta_id',$request->get('cuenta_id'));
        foreach($cuentas as $cuenta){
            if($cuenta->periodo_id == $request->get('periodo_id')){
                $cuenta->update($input);
                return redirect('/balance_general/crear/'.$request->get('periodo_id'));
            }
        }

        // * Ingresamos los datos
        cuenta_periodo::create($input);

        // * Redirigimos
        return redirect('/balance_general/crear/'.$request->get('periodo_id'));
    }

    public function guardar(Request $request)
    {
        $input = [
            'total' => request('total'),
            'cuenta_id' => request('cuenta_id'),
            'periodo_id' => request('periodo_id')
        ];

        // * Validacion que no exista otro igual
        $cuentas = cuenta_periodo::all()->where('cuenta_id',request('cuenta_id'));
        foreach($cuentas as $cuenta){
            if($cuenta->periodo_id == request('periodo_id')){
                $cuenta->update($input);
                return;
                // return redirect('/balance_general/crear/'.require('ids'));
            }
        }

        // * Ingresamos los datos
        cuenta_periodo::create($input);
        return;

        // * Redirigimos
        // return redirect('/balance_general/crear/'.require('ids'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cuenta_periodo  $cuenta_periodo
     * @return \Illuminate\Http\Response
     */
    public function show(cuenta_periodo $cuenta_periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuenta_periodo  $cuenta_periodo
     * @return \Illuminate\Http\Response
     */
    public function edit(cuenta_periodo $cuenta_periodo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuenta_periodo  $cuenta_periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuenta_periodo $cuenta_periodo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuenta_periodo  $cuenta_periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuenta_periodo $cuenta_periodo)
    {
        //
    }
}
