<?php

namespace App\Imports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Cliente|null
     */
    public function model(array $row)
    {
        if( !is_null($row["codcli"]) )
        {
            return new Cliente([
               'rv'     => $row["cdzopo"] ?? "NA",
               'codigo'    => $row["codcli"],
               'razon_social' => $row["nomcli"],
               'nombre_establecimiento' => $row["nomneg"],
            ]);

        }

        return null;
    }
    /*
    public function headingRow(): int
    {
        return 2;
    }
     */
}
