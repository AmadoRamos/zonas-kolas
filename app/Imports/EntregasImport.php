<?php

namespace App\Imports;

use App\Models\VehiculoCliente;
use App\Models\Cliente;
use App\Models\Vehiculo;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Datetime;

class EntregasImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return Novedad|null
     */
    public function model(array $row)
    {

        if( !is_null($row["codcli"]) )
        {
            $has_client = Cliente::where("codigo", $row["codcli"] )
                        ->orWhereRaw("cast(codigo as int) = ?", intval( $row["codcli"]) )
                        ->count();

            if( $has_client == 0 ) return null;


            $has_vehiculo = Vehiculo::where("code", $row["vehicu"] )->count();

            if( $has_vehiculo == 0 ) return null;

            $new_date = (( new Datetime($row["fechahh"]))->modify('+1 day'))->format('Y-m-d');


            if( date("w", strtotime($new_date))== 0 )
            {
                $new_date = (( new Datetime($new_date))->modify('+1 day'))->format('Y-m-d');
            }

            return new VehiculoCliente([
               'cliente_codigo'    => $row["codcli"],
               'vehiculo_codigo' => $row["vehicu"],
               'fecha' => $new_date ,
            ]);
        }
        return null;
    }
    public function headingRow(): int
    {
        return 2;
    }
}
