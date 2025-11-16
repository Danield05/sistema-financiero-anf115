<?php

namespace App\Exports;

use App\Models\cuenta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuentasExport implements FromCollection, WithHeadings
{
    protected $empresa_id;

    public function __construct($empresa_id)
    {
        $this->empresa_id = $empresa_id;
    }

    public function collection()
    {
        return cuenta::where('empresa_id', $this->empresa_id)->get(['codigo', 'nombre', 'tipo', 'padre']);
    }

    public function headings(): array
    {
        return [
            'Código',
            'Nombre',
            'Tipo',
            'Padre'
        ];
    }
}