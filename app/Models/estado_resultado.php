<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado_resultado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'periodo_id',
        'ventas',
        'devolucion_sobre_ventas',
        'costo_de_ventas',
        'gastos_de_operacion',
        'otros_ingresos',
        'gastos_no_operativos',
        'impuestos_sobre_la_renta'
    ];

    public function periodo(){
        return $this->belongsTo(periodo::class);
    }
}
