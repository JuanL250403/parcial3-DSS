<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /** 
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("videojuego_id")->constrained();
            $table->foreignId("user_id")->constrained('users');
            $table->integer("cantidad");
            $table->decimal("precio_venta", 10, 2);
            $table->boolean('vigente')->default(true);
            $table->decimal("subTotal");
            $table->decimal("porcentajeIva");
            $table->decimal("iva");
            $table->decimal("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
