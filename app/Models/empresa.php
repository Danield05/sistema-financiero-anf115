<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'nit',
        'nrc',
        'sector_id'
    ];

    //Relacion de uno a muchos
    public function user(){
        return $this->hasMany(user::class);
    }

    public function sector(){
        return $this->belongsTo(sector::class);
    }

    public function cuenta(){
        return $this->hasMany(cuenta::class);
    }

}
