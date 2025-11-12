<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuenta_periodo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'periodo_id',
        'cuenta_id',
        'total'
    ];

    public function periodo(){
        return $this->belongsTo(periodo::class);
    }

    public function cuenta(){
        return $this->belongsTo(cuenta::class);
    }
}
