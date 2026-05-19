<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideojuegoRequest;
use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videojuegos = Videojuego::all();
        return view('videojuegos.lista', compact('videojuegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('videojuegos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideojuegoRequest $request)
    {
        $videojuego = $request->validated();

        Videojuego::create($videojuego);

        return redirect()->route('videojuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Videojuego $videojuego)
    {
        return view('videojuegos.detalle', compact('videojuego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videojuego $videojuego)
    {
        return view('videojuegos.editar', compact('videojuego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideojuegoRequest $request, Videojuego $videojuego)
    {
        $videojuego->update($request->validated());
        return redirect()->route('videojuegos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videojuego $videojuego)
    {
        $videojuego->activo = false;
        $videojuego->save();
        return redirect()->route('videojuegos.index');
    }
}
