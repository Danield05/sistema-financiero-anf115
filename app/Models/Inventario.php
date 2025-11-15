<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'producto',
        'cantidad',
        'costo_unitario',
        'metodo',
        'tipo_movimiento',
        'fecha',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(empresa::class);
    }
}
