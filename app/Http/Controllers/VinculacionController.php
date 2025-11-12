<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use App\Models\cuenta_sistema;
use App\Models\vinculacion;
use Illuminate\Http\Request;

class VinculacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuenta_sistemas = cuenta_sistema::all();
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentass = cuenta::all();

        $cuentas = [];

        foreach($cuentass as $cuenta){
            if($cuenta->empresa_id == $empresa_id){
                array_push($cuentas,$cuenta);
            }
        }
        
        $cuentasa = json_encode($cuentas);
        return view('vistas.empresa.vinculacion', compact('cuenta_sistemas', 'cuentasa'));

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
            'cuenta' =>'required',
            'cuenta_sistema_id' =>'required',
        ]);

        // * Validacion de cuenta a cuenta id
        $cuenta = cuenta::all()->where('empresa_id','=', $request->get('empresa_id'))->where('nombre','=', $request->get('cuenta'))->first();
        $cuenta_id = $cuenta->id;
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;

        $vinculaciones = vinculacion::all();
        
        // * Ingresamos los datos
        $input = $request->except('_token', 'cuenta', 'empresa_id');
        $input['cuenta_id'] = $cuenta_id;
        $input['empresa_id'] = $empresa_id;
        
        foreach($vinculaciones as $vinculacion){
            if($vinculacion->empresa_id == $empresa_id && $vinculacion->cuenta_sistema_id == $request->get('cuenta_sistema_id') ){
                // return response()->json($vinculacion);
                $vinculacion->update($input);
                return redirect()->route('vinculacion.index');
            }
        }
        
        vinculacion::create($input);

        // * Redirigimos
        return redirect()->route('vinculacion.index');
    }

    public function guardar(Request $request){
        // * Validacion de cuenta a cuenta id
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuenta = cuenta::all()->where('empresa_id','=', $empresa_id)->where('nombre','=', request('cuenta'))->first();

        $cuenta_id = $cuenta->id;

        $vinculaciones = vinculacion::all();

        // * Ingresamos los datos
        $input['cuenta_sistema_id'] = request('cuenta_sistema_id');
        $input['cuenta_id'] = $cuenta_id;
        $input['empresa_id'] = $empresa_id;

        foreach($vinculaciones as $vinculacion){
            if($vinculacion->empresa_id == $empresa_id && $vinculacion->cuenta_sistema_id == request('cuenta_sistema_id') ){
                // return response()->json($vinculacion);
                $vinculacion->update($input);
                return;
                // return redirect()->route('vinculacion.index');
            }
        }

        vinculacion::create($input);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vinculacion  $vinculacion
     * @return \Illuminate\Http\Response
     */
    public function show(vinculacion $vinculacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vinculacion  $vinculacion
     * @return \Illuminate\Http\Response
     */
    public function edit(vinculacion $vinculacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vinculacion  $vinculacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vinculacion $vinculacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vinculacion  $vinculacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($cuenta_id)
    {
        $cuenta = vinculacion::all()->where('cuenta_id', $cuenta_id)->first();
        $cuenta->delete();
        // return response()->json($cuenta);
        return redirect()->route('vinculacion.index');
    }
}
