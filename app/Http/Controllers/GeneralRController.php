<?php

namespace App\Http\Controllers;

use App\Models\cuenta;
use App\Models\cuenta_periodo;
use App\Models\empresa;
use App\Models\periodo;
use App\Models\vinculacion;
use Illuminate\Http\Request;


class GeneralRController extends Controller
{
    // ! Ratios empresa
    public function ratios_empresa(){
        // * Variables
        $empresa_id = \Illuminate\Support\Facades\Auth::user()->empresa->id;
        $periodos = periodo::all()->where('empresa_id', $empresa_id);
        
        // * Razones financieras
        // $razon_circulantes = [];
        // $prueba_acidas = [];
        $razones_financieras = [];

        
        foreach($periodos as $periodo){
            // $razon_circulantes[$periodo->anio] = razon_circulante($empresa_id, $periodo->id);
            // $prueba_acidas[$periodo->anio] = prueba_acida($empresa_id, $periodo->id);
            $fila = [
                'anio' => $periodo->anio,
                'razon_circulante' => razon_circulante($empresa_id, $periodo->id),
                'prueba_acida' => prueba_acida($empresa_id, $periodo->id)
            ];

            array_push($razones_financieras, $fila);
        }

/*         $razones_financieras = [
            'razon_circulantes' => $razon_circulantes,
            'prueba_acidas' => $prueba_acidas
        ]; */
        // * Fin razones financieras


        // * Razones de eficiencia o actividad
        // $rotacion_inventarios = [];
        // $rotacion_cuentas_por_cobrars = [];
        $razones_eficiencia = [];

        foreach($periodos as $periodo){
            // $rotacion_inventarios[$periodo->anio] = rotacion_inventario($empresa_id, $periodo->id);
            // $rotacion_cuentas_por_cobrars[$periodo->anio] = rotacion_cuentas_por_cobrar($empresa_id, $periodo->id);
            $fila = [
                'anio' => $periodo->anio,
                'rotacion_inventario' => rotacion_inventario($empresa_id, $periodo->id),
                'rotacion_cuentas_por_cobrar' => rotacion_cuentas_por_cobrar($empresa_id, $periodo->id)
            ];

            array_push($razones_eficiencia, $fila);
        }

/*         $razones_eficiencia = [
            'rotacion_inventario' => $rotacion_inventarios,
            'rotacion_cuentas_por_cobrar' => $rotacion_cuentas_por_cobrars
        ]; */
        // * Fin razones de eficiencia o actividad

        // * Razones de endeudamiento
        // $grado_endeudamientos = [];
        // $razon_endeudamiento_patrimonials = [];
        $razones_endeudamiento = [];

        foreach($periodos as $periodo){
            // $grado_endeudamientos[$periodo->anio] = grado_endeudamiento($empresa_id, $periodo->id);
            // $razon_endeudamiento_patrimonials[$periodo->anio] = razon_endeudamiento_patrimonial($empresa_id, $periodo->id);

            $fila = [
                'anio' => $periodo->anio,
                'grado_endeudamiento' => grado_endeudamiento($empresa_id, $periodo->id),
                'razon_endeudamiento_patrimonial' => razon_endeudamiento_patrimonial($empresa_id, $periodo->id)
            ];

            array_push($razones_endeudamiento, $fila);
        }

/*         $razones_endeudamiento = [
            'grado_endeudamiento' => $grado_endeudamientos,
            'razon_endeudamiento_patrimonial' => $razon_endeudamiento_patrimonials
        ]; */
        // * Fin razones de endeudamiento

        // * Razones de rentabilidad
        // $rentabilidad_neta_del_patrimonios = [];
        // $rentabilidad_del_activos = [];
        // $rentabilidad_sobre_ventas = [];
        $fila_rentabilidad = [];
        $razones_rentabilidad = [];

        foreach($periodos as $periodo){
            // $rentabilidad_neta_del_patrimonios[$periodo->anio] = rentabilidad_neta_del_patrimonio($empresa_id, $periodo->id);
            // $rentabilidad_del_activos[$periodo->anio] = rentabilidad_del_activo($empresa_id, $periodo->id);
            // $rentabilidad_sobre_ventas[$periodo->anio] = rentabilidad_sobre_venta($empresa_id, $periodo->id);
            $fila_rentabilidad = [
                'anio' => $periodo->anio,
                'rentabilidad_neta_del_patrimonio' => rentabilidad_neta_del_patrimonio($empresa_id, $periodo->id),
                'rentabilidad_del_activos' => rentabilidad_del_activo($empresa_id, $periodo->id),
                'rentabilidad_sobre_ventas' => rentabilidad_sobre_venta($empresa_id, $periodo->id)
            ];

            array_push($razones_rentabilidad, $fila_rentabilidad);
        }

        // $razones_rentabilidad = [
        //     'rentabilidad_neta_del_patrimonio' => $rentabilidad_neta_del_patrimonios,
        //     'rentabilidad_del_activo' => $rentabilidad_del_activos,
        //     'rentabilidad_sobre_venta' => $rentabilidad_sobre_ventas
        // ];
        // * Fin razones de rentabilidad


        $razones = [
            'razones_financieras' => $razones_financieras,
            'razones_eficiencia' => $razones_eficiencia,
            'razones_endeudamiento' => $razones_endeudamiento,
            'razones_rentabilidad' => $razones_rentabilidad,
        ];

        // return response()->json($razones);

        return view('vistas.ratios.ratios', compact('razones_financieras', 'razones_eficiencia', 'razones_endeudamiento', 'razones_rentabilidad'));
    }
    // ! Fin ratios empresa

    // ! Comparacion de ratios
    public function comparacion(){
        $sector = \Illuminate\Support\Facades\Auth::user()->empresa->sector;
        $empresas = empresa::all()->where('sector_id', $sector->id);
        $periodos = periodo::all();
        $comparaciones = [];

        foreach($empresas as $empresa){
            $razon_circulante = 0;
            $prueba_acida = 0;
            $rotacion_inventario = 0;
            $rotacion_cuentas_por_cobrar = 0;
            $grado_endeudamiento = 0;
            $razon_endeudamiento_patrimonial = 0;
            $rentabilidad_neta_del_patrimonio = 0;
            $rentabilidad_del_activo = 0;
            $rentabilidad_sobre_venta = 0;

            $periodos = periodo::all()->where('empresa_id', $empresa->id);

            foreach($periodos as $periodo){
                $razon_circulante += round(floatval(validador(razon_circulante($empresa->id, $periodo->id))), 2);
                $prueba_acida += round(floatval(validador(prueba_acida($empresa->id, $periodo->id))), 2);
                $rotacion_inventario += round(floatval(validador(rotacion_inventario($empresa->id, $periodo->id))), 2);
                $rotacion_cuentas_por_cobrar += round(floatval(validador(rotacion_cuentas_por_cobrar($empresa->id, $periodo->id))), 2);
                $grado_endeudamiento += round(floatval(validador(grado_endeudamiento($empresa->id, $periodo->id))), 2);
                $razon_endeudamiento_patrimonial += round(floatval(validador(razon_endeudamiento_patrimonial($empresa->id, $periodo->id))), 2);
                $rentabilidad_neta_del_patrimonio += round(floatval(rentabilidad_neta_del_patrimonio($empresa->id, $periodo->id)),2);
                $rentabilidad_del_activo += round(floatval(validador(rentabilidad_del_activo($empresa->id, $periodo->id))), 2);
                $rentabilidad_sobre_venta += round(floatval(validador(rentabilidad_sobre_venta($empresa->id, $periodo->id))), 2);
            }

            $fila = [
                'empresa' => $empresa->nombre,
                'razon_circulante' => $razon_circulante,
                'prueba_acida' => $prueba_acida,
                'rotacion_inventario' => $rotacion_inventario,
                'rotacion_cuentas_por_cobrar' => $rotacion_cuentas_por_cobrar,
                'grado_endeudamiento' => $grado_endeudamiento,
                'razon_endeudamiento_patrimonial' => $razon_endeudamiento_patrimonial,
                'rentabilidad_neta_del_patrimonio' => $rentabilidad_neta_del_patrimonio,
                'rentabilidad_del_activo' => $rentabilidad_del_activo,
                'rentabilidad_sobre_venta' => $rentabilidad_sobre_venta
            ];

            array_push($comparaciones, $fila);
        }

        // return response()->json($sector);

        return view('vistas.ratios.comparacion', compact('comparaciones','sector'));
    }
    // ! Fin de comparacion de ratios
}

// * Ratios
function razon_endeudamiento_patrimonial($empresa_id, $periodo_id){
    $pasivo = cuenta_s_t($empresa_id, $periodo_id, 20);
    $patrimonio = cuenta_s_t($empresa_id, $periodo_id, 22);

    if($patrimonio == 0){
        return 'Faltan datos';
    }

    return round( ($pasivo/$patrimonio) , 2 );
}

function grado_endeudamiento($empresa_id, $periodo_id){
    $pasivo = cuenta_s_t($empresa_id, $periodo_id, 20);
    $activo = cuenta_s_t($empresa_id, $periodo_id, 3);

    if($activo == 0){
        return 'Faltan datos';
    }

    return round( ($pasivo/$activo) , 2 );
}

function rentabilidad_sobre_venta($empresa_id, $periodo_id){
    $utilidad_neta = cuenta_s_t($empresa_id, $periodo_id, 26);
    $ventas_neta = cuenta_s_t($empresa_id, $periodo_id, 25);

    if($ventas_neta == 0){
        return 'Faltan datos';
    }

    return round( ($utilidad_neta/$ventas_neta) , 2 );
}

function rentabilidad_del_activo($empresa_id, $periodo_id){
    $utilidad_neta = cuenta_s_t($empresa_id, $periodo_id, 26);
    $activo_promedio = cuenta_s_t($empresa_id, $periodo_id, 3);

    if($activo_promedio == 0){
        return 'Faltan datos';
    }

    return round( ($utilidad_neta/$activo_promedio) , 2 );
}

function rentabilidad_neta_del_patrimonio($empresa_id, $periodo_id){
    $utilidad_neta = cuenta_s_t($empresa_id, $periodo_id, 26);
    $patrimonio_promedio = cuenta_s_t($empresa_id, $periodo_id, 22);

    if($patrimonio_promedio == 0){
        return 'Faltan datos';
    }

    return round( ($utilidad_neta/$patrimonio_promedio) , 2 );
}

function rotacion_cuentas_por_cobrar($empresa_id, $periodo_id){
    $cuentas_por_cobrar_l = cuenta_s_t($empresa_id, $periodo_id, 8);
    $cuentas_por_cobrar_c = cuenta_s_t($empresa_id, $periodo_id, 7);
    $ventas_neta = cuenta_s_t($empresa_id, $periodo_id, 25);

    if( ( ($cuentas_por_cobrar_c + $cuentas_por_cobrar_l) / 2) != 0 ){
        return round( ( $ventas_neta / ( ($cuentas_por_cobrar_c + $cuentas_por_cobrar_l) / 2) ) , 2 );
    }

    return 'Faltan datos';
}

function rotacion_inventario($empresa_id, $periodo_id){
    $costo_de_ventas = cuenta_s_t($empresa_id, $periodo_id, 6);
    $inventario = cuenta_s_t($empresa_id, $periodo_id, 18);

    if($inventario == 0){
        return 0;
    }
    else{
        return round( ($costo_de_ventas/$inventario) , 2 );
    }
}

function prueba_acida($empresa_id, $periodo_id){
    $activo_corriente = cuenta_s_t($empresa_id, $periodo_id, 1);
    $pasivo_corriente = cuenta_s_t($empresa_id, $periodo_id, 21);
    $inventario = cuenta_s_t($empresa_id, $periodo_id, 18);

    if($pasivo_corriente == 0){
        return 'Faltan datos';
    }
    else{
        $retorno = ($activo_corriente - $inventario) / $pasivo_corriente;
        return round($retorno, 2);
    }
}

function razon_circulante($empresa_id, $periodo_id){
    $activo_corriente = cuenta_s_t($empresa_id, $periodo_id, 1);
    $pasivo_corriente = cuenta_s_t($empresa_id, $periodo_id, 21);

    if($pasivo_corriente == 0){
        return 'Faltan datos';
    }
    else{
        $retorno = $activo_corriente/$pasivo_corriente;
        return round($retorno, 2);
    }
}

//!Buscador de valores
function cuenta_s_t($empresa_id, $periodo_id, $cuenta_s){
    $cuenta = vinculacion::all()->where('empresa_id',$empresa_id)->where('cuenta_sistema_id', $cuenta_s)->first();
    if($cuenta == null){
        return 0;
    }

    $valor = cuenta_periodo::all()->where('cuenta_id', $cuenta->cuenta_id)->where('periodo_id', $periodo_id)->first();
    if($valor == null){
        return 0;
    }

    return $valor->total;
}

// ! metedor de valores
function validador($valor){
    if($valor != 'Faltan datos'){
        return $valor;
    }
    else{
        return 0;
    }
}