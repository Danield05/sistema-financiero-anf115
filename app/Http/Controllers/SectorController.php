<?php

namespace App\Http\Controllers;

use App\Models\sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sectors = sector::all();
        return view('vistas.recursos.sectores', compact('sectors'));
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
            'nombre' =>'required|',
            'razon_circulante' =>'required|',
            'prueba_acida' =>'required|',
            'rotacion_inventario' =>'required|',
            'rotacion_cuentas_por_cobrar' =>'required|',
            'grado_endeudamiento' =>'required|',
            'razon_endeudamiento_patrimonial' =>'required|',
            'rentabilidad_neta_del_patrimonio' =>'required|',
            'rentabilidad_del_activo' =>'required|',
            'rentabilidad_sobre_venta' =>'required|',
        ]);

        $input = $request->except('_token');
        sector::create($input);
        return redirect()->route('sector.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show(sector $sector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit(sector $sector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' =>'required|',
            'razon_circulante' =>'required|',
            'prueba_acida' =>'required|',
            'rotacion_inventario' =>'required|',
            'rotacion_cuentas_por_cobrar' =>'required|',
            'grado_endeudamiento' =>'required|',
            'razon_endeudamiento_patrimonial' =>'required|',
            'rentabilidad_neta_del_patrimonio' =>'required|',
            'rentabilidad_del_activo' =>'required|',
            'rentabilidad_sobre_venta' =>'required|',
        ]);

        $input = $request->except('_token', '_method');
        
        $sector_a_modificar = sector::find($id);
        $sector_a_modificar->update($input);

        return redirect()->route('sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        sector::find($id)->delete();
        return redirect()->route('sector.index');
    }
}
