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
                $vinculacion->update($input);
                return redirect()->route('vinculacion.index')->with('success', 'Vinculación actualizada correctamente.');
            }
        }

        vinculacion::create($input);

        // * Redirigimos con mensaje de éxito
        return redirect()->route('vinculacion.index')->with('success', 'Vinculación creada correctamente.');
    }

    public function guardar(Request $request){
        try {
            \Log::info('Guardar vinculaciones iniciado', ['request' => $request->all()]);
            $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
            $vinculaciones_data = $request->json()->get('vinculaciones', []);

            \Log::info('Datos de vinculaciones', ['data' => $vinculaciones_data]);

            if (empty($vinculaciones_data)) {
                return response()->json(['error' => 'No hay vinculaciones para guardar'], 400);
            }

            $saved = 0;
            $errors = [];

            foreach ($vinculaciones_data as $data) {
                $cuenta_sistema_id = $data['cuenta_sistema_id'];
                $cuenta_nombre = $data['cuenta'];

                if (empty($cuenta_nombre)) {
                    // Si no hay cuenta, saltar o eliminar vinculación existente
                    $existing = vinculacion::where('empresa_id', $empresa_id)
                        ->where('cuenta_sistema_id', $cuenta_sistema_id)
                        ->first();
                    if ($existing) {
                        $existing->delete();
                        $saved++;
                    }
                    continue;
                }

                $cuenta = cuenta::where('empresa_id', $empresa_id)
                    ->where('nombre', $cuenta_nombre)
                    ->first();

                if (!$cuenta) {
                    $errors[] = "Cuenta '{$cuenta_nombre}' no encontrada";
                    continue;
                }

                $cuenta_id = $cuenta->id;

                $existing = vinculacion::where('empresa_id', $empresa_id)
                    ->where('cuenta_sistema_id', $cuenta_sistema_id)
                    ->first();

                if ($existing) {
                    $existing->update(['cuenta_id' => $cuenta_id]);
                } else {
                    vinculacion::create([
                        'cuenta_sistema_id' => $cuenta_sistema_id,
                        'cuenta_id' => $cuenta_id,
                        'empresa_id' => $empresa_id
                    ]);
                }
                $saved++;
            }

            if (!empty($errors)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Guardado parcial. Errores: ' . implode(', ', $errors),
                    'saved' => $saved
                ], 200);
            }

            return response()->json(['success' => true, 'message' => 'Vinculaciones guardadas correctamente', 'saved' => $saved]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al guardar vinculaciones: ' . $e->getMessage()], 500);
        }
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
