<?php

namespace App\Http\Controllers;

use App\Http\Requests\VentaRequest;
use App\Http\Resources\VentaResource;
use App\Models\Venta;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Venta::with(['usuario', 'videojuego'])->get();
        return view('ventas.lista', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $videojuegos = Videojuego::where('activo', true)->get();

        return view('ventas.crear', compact('videojuegos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VentaRequest $request)
    {
        $usuario = Auth::user();

        $venta = $request->validated();

        $videojuego = Videojuego::find($venta['videojuego_id']);

        if ($videojuego->cantidad < $venta['cantidad']) {
            return back()->withErrors([
                'cantidad' => 'Cantidad de producto insuficiente'
            ]);
        }
        $videojuego->cantidad = $videojuego->cantidad - $venta['cantidad'];
        $venta['user_id'] = $usuario->id;
        $venta['porcentajeIva'] = 13.0;
        Venta::create($venta);
        $videojuego->save();

        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        return view('ventas.detalle', compact('venta'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
        $venta->vigente = false;
        $venta->save();
        $videojuego = $venta->videojuego;

        $videojuego->cantidad = $videojuego->cantidad + $venta->cantidad; 
        $videojuego->save();
        return redirect()->route('ventas.index');
    }
}
