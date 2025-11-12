<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use App\Models\cuenta_periodo;
use App\Models\periodo;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    // ! Analisis horizontal
    public function analisis_horizontal_index(){
        
        // * Var generales
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;

        $cuentas = periodo::all()->where('empresa_id', $empresa_id)->pluck('anio', 'id');

        return view('vistas.analisis.horizontal', compact('cuentas'));
    }

    public function analisis_horizontal(Request $request){
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas1 = cuenta_periodo::all()->where('periodo_id', $request->get('periodo_1') );
        $cuentas2 = cuenta_periodo::all()->where('periodo_id', $request->get('periodo_2') );

        $periodo1_nombre = periodo::find($request->get('periodo_1'))->anio;
        $periodo2_nombre = periodo::find($request->get('periodo_2'))->anio;
        
        $cuentas = cuenta::all()->where('empresa_id', $empresa_id);
        $cuenta_supreme = [];

        foreach($cuentas as $cuenta){
            $cuenta1 = $cuentas1->where('cuenta_id', $cuenta->id)->first();
            $cuenta2 = $cuentas2->where('cuenta_id', $cuenta->id)->first();

            $unidor = [];

            $unidor['cuenta'] = $cuenta->nombre;

            if($cuenta1 != null){
                if($cuenta1->count() > 0){
                    $unidor['cuenta1'] = $cuenta1->total;
                }
                // else if($cuenta1->count() == null){
                //     $unidor['cuenta1'] = 0;
                // }
            }
            else{
                $unidor['cuenta1'] = 0;
            }

            if($cuenta2 != null){
                if($cuenta2->count() > 0){
                    $unidor['cuenta2'] = $cuenta2->total;
                }
                // else if($cuenta2->count() == null){
                //     $unidor['cuenta2'] = 0; 
                // }
            }
            else{
                $unidor['cuenta2'] = 0; 
            }


            $unidor['absoluta'] = $unidor['cuenta2'] - $unidor['cuenta1'];
            if($cuenta2 == null){
                $unidor['relativa'] = 'N/A';
            }
            else if($cuenta2->count() > 0){
                $unidor['relativa'] = ( ( $unidor['cuenta2'] / $unidor['cuenta1'] ) - 1 ) * 100;
            }

            array_push($cuenta_supreme, $unidor);
        }

        // return response()->json($cuenta_supreme);

        return view('vistas.analisis.a_horizontal', compact('cuenta_supreme', 'periodo1_nombre', 'periodo2_nombre'));
    }

    // ! Fin analisis horizontal



    // ! Analisis vertical

    public function analisis_vertical_index(){
        
        // * Var generales
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;

        $cuentas = periodo::all()->where('empresa_id', $empresa_id)->pluck('anio', 'id');

        return view('vistas.analisis.vertical', compact('cuentas'));
    }

    public function analisis_vertical(Request $request){
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $cuentas1 = cuenta_periodo::all()->where('periodo_id', $request->get('periodo_1') );
        $cuentas2 = cuenta_periodo::all()->where('periodo_id', $request->get('periodo_2') );
        
        $cuentas = cuenta::all()->where('empresa_id', $empresa_id);
        $cuenta_supreme = [];

        $periodo1 = periodo::find($request->get('periodo_1'))->anio;
        $periodo2 = periodo::find($request->get('periodo_2'))->anio;

        $activo1 = 0;
        $activo2 = 0;

        $pasivo1 = 0;
        $pasivo2 = 0;

        $patrimonio1 = 0;
        $patrimonio2 = 0;

        foreach($cuentas1 as $cuenta1){
            if($cuenta1->cuenta->tipo == 1){
                $activo1 += $cuenta1->total;
            }
            else if($cuenta1->cuenta->tipo == 0){
                $pasivo1 += $cuenta1->total;
            }
            else if($cuenta1->cuenta->tipo == 2){
                $patrimonio1 += $cuenta1->total;
            }
        }

        foreach($cuentas2 as $cuenta2){
            if($cuenta2->cuenta->tipo == 1){
                $activo2 += $cuenta2->total;
            }
            else if($cuenta2->cuenta->tipo == 0){
                $pasivo2 += $cuenta2->total;
            }
            else if($cuenta2->cuenta->tipo == 2){
                $patrimonio2 += $cuenta2->total;
            }
        }

        $totales = [
            'activo1' => $activo1,
            'activo2' => $activo2,
            'pasivo1' => $pasivo1,
            'pasivo2' => $pasivo2,
            'patrimonio1' => $patrimonio1,
            'patrimonio2' => $patrimonio2,
        ];


        foreach($cuentas as $cuenta){
            $cuenta1 = $cuentas1->where('cuenta_id', $cuenta->id)->first();
            $cuenta2 = $cuentas2->where('cuenta_id', $cuenta->id)->first();

            $unidor = [];

            $unidor['cuenta'] = $cuenta->nombre;
            $unidor['tipo'] = $cuenta1->cuenta->tipo;

            if($cuenta1 != null){
                if($cuenta1->count() > 0){
                    $unidor['cuenta1'] = $cuenta1->total;
                }
                // else if($cuenta1->count() == null){
                //     $unidor['cuenta1'] = 0;
                // }
            }
            else{
                $unidor['cuenta1'] = 0;
            }

            if($cuenta2 != null){
                if($cuenta2->count() > 0){
                    $unidor['cuenta2'] = $cuenta2->total;
                }
                // else if($cuenta2->count() == null){
                //     $unidor['cuenta2'] = 0; 
                // }
            }
            else{
                $unidor['cuenta2'] = 0; 
            }

            if($cuenta1 != null){
                if($cuenta1->cuenta->tipo == 1){
                    if($activo1 != 0){
                        $variacion1 = $cuenta1->total / $activo1;
                        $unidor['variacion1'] = $variacion1 * 100;
                    }
                    else{
                        $unidor['variacion1'] = 'N/A';
                    }
                }
                else if($cuenta1->cuenta->tipo == 0){
                    if($pasivo1 != 0){
                        $variacion1 = $cuenta1->total / $pasivo1;
                        $unidor['variacion1'] = $variacion1 * 100;
                    }
                    else{
                        $unidor['variacion1'] = 'N/A';
                    }
                }
                else if($cuenta1->cuenta->tipo == 2){
                    if($patrimonio1 != 0){
                        $variacion1 = $cuenta1->total / $patrimonio1;
                        $unidor['variacion1'] = $variacion1 * 100;
                    }
                    else{
                        $unidor['variacion1'] = 'N/A';
                    }
                }
            }
            else{
                $unidor['variacion1'] = 'N/A';
            }

            if($cuenta2 != null){
                if($cuenta2->cuenta->tipo == 1){
                    if($activo2 != 0){
                        $variacion2 = $cuenta2->total / $activo2;
                        $unidor['variacion2'] = $variacion2 * 100;
                    }
                    else{
                        $unidor['variacion2'] = 'N/A';
                    }
                }
                else if($cuenta2->cuenta->tipo == 0){
                    if($pasivo2 != 0){
                        $variacion2 = $cuenta2->total / $pasivo2;
                        $unidor['variacion2'] = $variacion2 * 100;
                    }
                    else{
                        $unidor['variacion2'] = 'N/A';
                    }
                }
                else if($cuenta2->cuenta->tipo == 2){
                    if($patrimonio2 != 0){
                        $variacion2 = $cuenta2->total / $patrimonio2;
                        $unidor['variacion2'] = $variacion2 * 100;
                    }
                    else{
                        $unidor['variacion2'] = 'N/A';
                    }
                }
            }
            else{
                $unidor['variacion2'] = 'N/A';
            }

            array_push($cuenta_supreme, $unidor);
        }

        // return response()->json($cuenta_supreme);

        return view('vistas.analisis.a_vertical', compact('cuenta_supreme', 'totales', 'periodo1', 'periodo2'));
    }

    // ! Fin analisis vertical
}
