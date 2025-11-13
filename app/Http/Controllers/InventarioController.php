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
        return view('vistas.inventario.create');
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
            'producto' => 'required|string',
            'cantidad' => 'required|integer|min:1',
            'costo_unitario' => 'required|numeric|min:0',
            'metodo' => 'required|in:PEPS,UEPS,costo_promedio',
            'fecha' => 'required|date',
        ]);

        Inventario::create([
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'costo_unitario' => $request->costo_unitario,
            'metodo' => $request->metodo,
            'fecha' => $request->fecha,
            'empresa_id' => auth()->user()->empresa->id,
        ]);

        return redirect()->route('inventario.index')->with('success', 'Producto agregado al inventario.');
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
        return view('vistas.inventario.show', compact('inventario'));
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
        return view('vistas.inventario.edit', compact('inventario'));
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
            'metodo' => 'required|in:PEPS,UEPS,costo_promedio',
            'fecha' => 'required|date',
        ]);

        $inventario = Inventario::findOrFail($id);
        $inventario->update($request->all());

        return redirect()->route('inventario.index')->with('success', 'Producto actualizado correctamente.');
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
