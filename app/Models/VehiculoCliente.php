<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        "cliente_codigo",
        "vehiculo_codigo",
        "fecha",
    ];

    protected $table = "vehiculo_cliente";



    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class, 'code', 'vehiculo_codigo');
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'codigo', 'cliente_codigo');
    }

    public function novedades()
    {
        return $this->hasMany(Novedad::class, 'cliente_codigo', 'cliente_codigo');
    }
}
