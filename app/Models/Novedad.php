<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    use HasFactory;

    protected $fillable = [
        "cliente_codigo",
        "producto",
        "motivo",
    ];

    protected $table = "novedad";

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'codigo', 'cliente_codigo');
    }
}
