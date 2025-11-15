<?php

namespace App\Imports;

use App\Models\cuenta;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class CuentasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    *
    */
    public function collection(Collection $rows)
    {
        $tipoMap = [
            'deudora' => 0,
            'acreedora' => 1,
            'patrimonio' => 2,
            'resultado' => 3,
            'activo' => 0,
            'pasivo' => 1,
            '0' => 0,
            '1' => 1,
            '2' => 2,
            '3' => 3,
        ];

        $errors = [];

        foreach ($rows as $index => $row){
            $codigo = $row['codigo'] ?? $row['Código'] ?? null;
            $nombre = $row['nombre'] ?? $row['Nombre'] ?? null;
            $padre = $row['padre'] ?? $row['Padre'] ?? null;
            $tipoTexto = $row['tipo'] ?? $row['Tipo'] ?? null;

            $missing = [];
            if (empty($codigo)) $missing[] = 'Código';
            if (empty($nombre)) $missing[] = 'Nombre';
            if (empty($tipoTexto)) $missing[] = 'Tipo';

            if (!empty($missing)) {
                $errors[] = "Fila " . ($index + 2) . ": Campos obligatorios faltantes: " . implode(', ', $missing) . ".";
                continue;
            }

            $tipoTexto = strtolower(trim($tipoTexto));
            if (!isset($tipoMap[$tipoTexto])) {
                $errors[] = "Fila " . ($index + 2) . ": Tipo '{$tipoTexto}' no válido. Debe ser 'deudora', 'acreedora', 'patrimonio' o 'resultado'.";
                continue;
            }

            $tipo = $tipoMap[$tipoTexto];
            try {
                $data=[
                    'empresa_id' => \Illuminate\Support\Facades\Auth::user()->empresa->id,
                    'codigo' => $codigo,
                    'nombre' => $nombre,
                    'tipo'=> $tipo,
                    'padre' => $padre ?: null,
                ];
                cuenta::create($data);
            } catch (\Exception $e) {
                $errors[] = "Fila " . ($index + 2) . ": Error al crear cuenta '{$nombre}': " . $e->getMessage();
            }
        }

        if (!empty($errors)) {
            // Store errors in session to display in view
            session()->flash('import_errors', $errors);
        }
    }

}
