<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta_sistema extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'uso',
        // 'descripcion'
    ];

    public function vinculacion(){
        return $this->hasMany(vinculacion::class);
    }
}
