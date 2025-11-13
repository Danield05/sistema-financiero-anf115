<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalanceGeneral extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'periodo_id',
        'empresa_id',
        'activo',
        'pasivo',
        'patrimonio'
    ];

    public function empresa(){
        return $this->belongsTo(empresa::class);
    }

    public function periodo(){
        return $this->belongsTo(periodo::class);
    }
}
