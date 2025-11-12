<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\empresa;

class sector extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'razon_circulante',
        'prueba_acida',
        'rotacion_inventario',
        'rotacion_cuentas_por_cobrar',
        'grado_endeudamiento',
        'razon_endeudamiento_patrimonial',
        'rentabilidad_neta_del_patrimonio',
        'rentabilidad_del_activo',
        'rentabilidad_sobre_venta',
    ];
    
    public function empresa(){
        return $this->hasMany(empresa::class);
    }
}
