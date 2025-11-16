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
        try {
            $input = [
                'total' => request('total'),
                'cuenta_id' => request('cuenta_id'),
                'periodo_id' => request('periodo_id')
            ];

            // Validación básica
            if (!is_numeric($input['total']) || $input['total'] < 0) {
                return response()->json(['error' => 'Total inválido'], 400);
            }

            // * Validacion que no exista otro igual
            $cuentas = cuenta_periodo::where('cuenta_id', request('cuenta_id'))->where('periodo_id', request('periodo_id'))->first();
            if ($cuentas) {
                $cuentas->update($input);
            } else {
                cuenta_periodo::create($input);
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Error en guardar cuenta_periodo: ' . $e->getMessage());
            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
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
