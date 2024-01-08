<?php

namespace App\Imports;

use App\Models\Novedad;
use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NovedadesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Novedad|null
     */
    public function model(array $row)
    {

        if( !is_null($row["cliente"]) )
        {
            $has_client = Cliente::where("codigo", $row["cliente"] )
                        ->orWhereRaw("cast(codigo as int) = ?", intval( $row["cliente"]) )
                        ->count();

            if( $has_client == 0 ) return null;

            return new Novedad([
               'cliente_codigo'    => $row["cliente"],
               'producto' => $row["nombre_producto"],
               'motivo' => $row["motivo"],
            ]);

        }

        return null;
    }
    public function headingRow(): int
    {
        return 4;
    }
}
