<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        "rv",
        "codigo",
        "razon_social",
        "nombre_establecimiento",
    ];

    protected $table = "cliente";
}
