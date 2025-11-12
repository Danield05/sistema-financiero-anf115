<?php

namespace App\Http\Controllers;

use App\Models\empresa;
use App\Models\sector;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission::ver-empresa|crear-empresa|editar-empresa|borrar-empresa', ['only'=>['index']]);
        $this->middleware('permission:crear-empresa',['only'=>['create','store']]);
        $this->middleware('permission:editar-empresa',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-empresa',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = empresa::paginate(5);
        return view('security.empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectors = sector::pluck('nombre','id')->all();
        return view('security.empresas.create', compact('sectors'));
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
            'nombre' =>'required',
            'nit' => 'required|max:15|min:8',
            'nrc' => 'required|max:15|min:8',
            'sector_id' => 'required'
        ]);

        $input = $request->except('_token');
        $input['catalogo_listo'] = false;
        $input['vinculacion_listo'] = false;
        empresa::insert($input);

        return redirect()->route('empresa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = empresa::find($id);
        $sectors = sector::all();
        return view('security.empresas.edit', compact('empresa','sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' =>'required',
            'nit' => 'required|max:15|min:8',
            'nrc' => 'required|max:15|min:8',
            'sector_id' => 'required'
        ]);

        $data = request()->except(['_token', '_method']);
        empresa::where('id','=',$id)->update($data);

        return redirect()->route('empresa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        empresa::find($id)->delete();
        return redirect()->route('empresa.index');
    }
}
