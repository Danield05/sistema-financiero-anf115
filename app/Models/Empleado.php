<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'dui',
        'nit',
        'fecha_nacimiento',
        'fecha_contratacion',
        'salario_base',
        'empresa_id'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function planillas()
    {
        return $this->hasMany(PlanillaSueldo::class);
    }
}
