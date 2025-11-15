<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mostrar todos los contenedores de inventario
        $inventarios = Inventario::where('empresa_id', auth()->user()->empresa->id)->get();
        return view('vistas.inventario.index', compact('inventarios'));
    }

    public function peps()
    {
        $inventarios = Inventario::where('empresa_id', auth()->user()->empresa->id)
                                ->where('metodo', 'PEPS')
                                ->get();
        return view('vistas.inventario.peps', compact('inventarios'));
    }

    public function ueps()
    {
        $inventarios = Inventario::where('empresa_id', auth()->user()->empresa->id)
                                ->where('metodo', 'UEPS')
                                ->get();
        return view('vistas.inventario.ueps', compact('inventarios'));
    }

    public function costoPromedio()
    {
        $inventarios = Inventario::where('empresa_id', auth()->user()->empresa->id)
                                ->where('metodo', 'costo_promedio')
                                ->get();
        return view('vistas.inventario.costo_promedio', compact('inventarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo = request('metodo');
        $inventario_id = request('inventario_id');

        if ($inventario_id) {
            $inventario = Inventario::findOrFail($inventario_id);
            return view('vistas.inventario.create', compact('metodo', 'inventario'));
        }

        return view('vistas.inventario.create', compact('metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Solo crear contenedores de inventario
        $request->validate([
            'producto' => 'required|string',
            'metodo' => 'required|in:PEPS,UEPS,costo_promedio',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        Inventario::create([
            'producto' => $request->producto,
            'metodo' => $request->metodo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'empresa_id' => auth()->user()->empresa->id,
        ]);

        return redirect()->route('inventario.index')->with('success', 'Inventario creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventario = Inventario::findOrFail($id);

        // Por ahora, no hay movimientos separados, solo mostramos el contenedor
        $movimientos = collect(); // Colección vacía

        return view('vistas.inventario.show', compact('inventario', 'movimientos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventario = Inventario::findOrFail($id);
        $movimientos = Inventario::where('producto', $inventario->producto)
                                ->where('empresa_id', auth()->user()->empresa->id)
                                ->orderBy('fecha', 'desc')
                                ->get();
        return view('vistas.inventario.edit', compact('inventario', 'movimientos'));
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
            'producto' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'costo_unitario' => 'required|numeric|min:0',
            'tipo_movimiento' => 'required|in:entrada,salida',
            'metodo' => 'required|in:PEPS,UEPS,costo_promedio',
            'fecha' => 'required|date',
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->update($request->all());

        return redirect()->route('inventario.index')->with('success', 'Movimiento de inventario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventario = Inventario::findOrFail($id);
        $inventario->delete();

        return redirect()->route('inventario.index')->with('success', 'Producto eliminado del inventario.');
    }
}
