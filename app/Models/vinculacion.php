<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vinculacion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'cuenta_id',
        'cuenta_sistema_id',
        'empresa_id'
    ];

    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }

    public function cuenta_sistema(){
        return $this->belongsTo(cuenta_sistema::class);
    }

}
