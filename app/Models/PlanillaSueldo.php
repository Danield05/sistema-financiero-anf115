<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanillaSueldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'periodo',
        'fecha_inicio',
        'fecha_fin',
        'dias_laborados',
        'dias_faltados_con_permiso',
        'dias_faltados_sin_permiso',
        'salario_base',
        'afp_empleado',
        'iss_empleado',
        'renta',
        'aguinaldo',
        'vacaciones',
        'total_deducciones',
        'sueldo_neto'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    // Cálculos de descuentos legales (ejemplo para El Salvador)
    public static function calcularAFP($salario_base)
    {
        return $salario_base * 0.0725; // 7.25% AFP empleado
    }

    public static function calcularISSS($salario_base)
    {
        $tope = 1000; // Tope ISSS
        $salario_tope = min($salario_base, $tope);
        return $salario_tope * 0.03; // 3% ISSS
    }

    public static function calcularRenta($salario_base)
    {
        // Cálculo simplificado de renta (ajustar según tabla de IR)
        if ($salario_base <= 472) return 0;
        elseif ($salario_base <= 895.24) return ($salario_base - 472) * 0.1 + 17.67;
        elseif ($salario_base <= 2038.10) return ($salario_base - 895.24) * 0.2 + 60;
        else return ($salario_base - 2038.10) * 0.3 + 288.57;
    }

    public static function calcularAguinaldo($salario_base, $meses_trabajados = 12)
    {
        return ($salario_base / 12) * $meses_trabajados;
    }

    public static function calcularVacaciones($salario_base, $dias_vacaciones = 15)
    {
        return ($salario_base / 30) * $dias_vacaciones;
    }
}
