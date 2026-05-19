<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Videojuego extends Model
{
    protected $fillable = [
        "nombre",
        "descripcion",
        "cantidad",
        "activo",
        "precio_unitario",
        "categoria"
    ];

    protected $casts = [
        "precio_unitario" => "decimal:2",
        "valor_total" => "decimal:2",
        "activo" => "boolean"
    ];

    public function compras(): HasMany {
        return $this->hasMany(Venta::class);
    }
}
