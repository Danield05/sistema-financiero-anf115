<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'anio',
        'empresa_id',
        'gasto_financiero',
        'inversion_inicial'
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function cuenta_periodo(){
        return $this->hasMany(cuenta_periodo::class);
    }
}
