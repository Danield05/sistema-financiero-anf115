<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use App\Models\cuenta_periodo;
use App\Models\empresa;
use App\Models\periodo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Imports\CuentasImport;
use Maatwebsite\Excel\Facades\Excel;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $empresa= empresa::where('id', $empresa_id)->first();
        $confirmar = $empresa->catalogo_listo;
        $cuentas = cuenta::all()->where('empresa_id',$empresa_id);
        return view('vistas.empresa.catalogo', compact('cuentas','confirmar'));
    }

    public function cuentas()
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas = cuenta::all()->where('empresa_id',$empresa_id);
        return view('vistas.empresa.cuentas', compact('cuentas'));
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
            'nombre' =>'required|max:75',
            'codigo' => 'required|max:50,codigo',
            'padre' => 'max:50',
        ]);

        $input = $request->all();
        cuenta::create($input);

        return redirect()->route('catalogo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(cuenta $cuenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(cuenta $cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' =>'required|max:75',
            'codigo' => 'required|max:50|',
            'padre' => 'max:50',
        ]);

        $input = $request->except(['_token', '_method']);
        cuenta::where('id',$id)->update($input);

        return redirect()->route('catalogo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        cuenta::find($id)->delete();
        return redirect()->route('catalogo.index');
    }


    public function descargarExcel(Request $request){
        // $idUsuarioLogeado=auth()->user()->id;
        $nombre_descarga= "Plantilla.xlsx";
        $ruta='plantillasExcel/Plantilla.xlsx';
        return Storage::download($ruta,$nombre_descarga);
    }

    public function cargarExcel(Request $request){
        Excel::import(new CuentasImport, $request->file('archivo'));
        return back();
    }

    public function confirmarCatalogo()
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $empresa= empresa::where('id', $empresa_id)->first();
        $empresa->catalogo_listo=TRUE;
        $empresa->save();
        return redirect()->route('catalogo.index');

    }

    public function graficos()
    {
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas = cuenta::all()->where('empresa_id',$empresa_id);
        return view('vistas.empresa.graficos', compact('cuentas'));
    }

    public function graficoDeCuenta($id){

        // * Validacion
        // $this->validate($request, [
        //     'cuenta' =>'required',
        // ]);
        // $cuentasPeriodo=cuenta_periodo::all()->where();
        $cuenta=cuenta::find($id);
        $cuentasPeriodo=cuenta_periodo::all()->where('cuenta_id',$id);
        $puntos=[];
        foreach($cuentasPeriodo as $cuentaPeriodo){
            $puntos[]=round($cuentaPeriodo->total);
        }
        if(sizeof($puntos)==0){
            $sinRegistros = True;
            return view('vistas.empresa.graficoDeCuenta',compact('cuenta','sinRegistros'));
        }
        else{
            $sinRegistros = False;
            $periodoInicial=periodo::find($cuentasPeriodo->first()->periodo_id);
            return view('vistas.empresa.graficoDeCuenta',compact('cuenta','cuentasPeriodo','periodoInicial','sinRegistros'),['puntos'=>json_encode($puntos)]);
        }
    }
}
