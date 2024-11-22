<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table='carrito';

    protected $fillable = [
        'usuario_id',
        'producto_id',
        'cantidad',
        'fecha_agregado'
    ];
}

