<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Venta extends Model
{
    protected $fillable = [
        "videojuego_id",
        "user_id",
        "subTotal",
        "cantidad",
        "porcentajeIva",
        "iva",
        "total",
        'vigente'
    ];

    protected $casts = [
        "subTotal" => "decimal:2",
        "porcentajeIva" => "decimal:2",
        "cantidad" => 'integer',
        "iva" => "decimal:2",
        "total" => "decimal:2",
        "precio_venta" => "decimal:2",
        "vigente" => 'boolean'
    ];

    protected static function booted()
    {
        static::creating(function ($detalle) {
            $detalle->precio_venta = $detalle->videojuego->precio_unitario;
            $detalle->subTotal = $detalle->videojuego->precio_unitario * $detalle->cantidad;
            $detalle->iva = $detalle->subTotal * ($detalle->porcentajeIva / 100);
            $detalle->total = $detalle->iva + $detalle->subTotal;
        });
    }

    public function usuario(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id');
    }

    public function videojuego(): BelongsTo {
        return $this->belongsTo(Videojuego::class);
    }
}
