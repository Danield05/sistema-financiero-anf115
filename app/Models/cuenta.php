<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'tipo',
        'padre',
        'codigo',
        'empresa_id'
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function vinculacion(){
        return $this->hasMany(vinculacion::class);
    }

    public function cuenta_periodo(){
        return $this->hasMany(cuenta_periodo::class);
    }
}
