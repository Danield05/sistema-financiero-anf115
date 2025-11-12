<?php

namespace App\Imports;

use App\Models\cuenta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;

class CuentasImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    *
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){
            $data=[
                'empresa_id' => \Illuminate\Support\Facades\Auth::user()->empresa->id,
                'codigo' => $row['codigo'],
                'nombre' => $row['nombre'],
                'tipo'=> $row['tipo'],
                'padre' => $row['padre'],  
            ];
            cuenta::create($data);
        }
    }

    public function rules(): array{
        return[
            'codigo'=>'required',
            'nombre'=>['required', 'string'],
            'tipo'=> 'required|integer|between:0,3',
        ];
    }
}
