@extends('layouts.app')

@section('title', 'Videojuegos')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Detalle del Videojuego</h3>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Nombre:</label>
                        <p class="">{{ $videojuego->nombre }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Categoría:</label>
                        <p class="">{{ $videojuego->categoria }}</p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Precio:</label>
                        <p class=" text-success fw-bold">
                            ${{ number_format($videojuego->precio_unitario, 2) }}
                        </p>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Cantidad en stock:</label>
                        <p class="">{{ $videojuego->cantidad }}</p>
                    </div>

                    <div class="col-12 mb-3">
                        <label class="fw-bold">Descripción:</label>
                        <p>{{ $videojuego->descripcion }}</p>
                    </div>
                    <div class="col-md-6">
                        <label class="text-muted fw-bold">Estado</label>
                        <p>
                            @if ($videojuego->activo)
                                <span class="badge bg-success">Vigente</span>
                            @else
                                <span class="badge bg-danger">No vigente</span>
                            @endif
                        </p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary">
                        Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
