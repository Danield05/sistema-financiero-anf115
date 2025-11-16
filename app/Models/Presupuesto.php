<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'periodo_id',
        'empresa_id',
        'descripcion',
        'monto_presupuestado',
        'monto_real',
        'fecha_inicio',
        'fecha_fin'
    ];

    public function periodo()
    {
        return $this->belongsTo(periodo::class);
    }

    public function empresa()
    {
        return $this->belongsTo(empresa::class);
    }
}
