@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4 fw-bold text-dark">Bienvenido a GameStore</h1>
            <p class="lead text-muted mt-3">
                Sistema de gestión y ventas de videojuegos
            </p>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 text-center p-4">
                    <div class="card-body">
                        <h3 class="mb-3">Productos</h3>
                        <p class="text-muted">
                            Consulta y administra el catálogo de videojuegos disponibles.
                        </p>
                        <a href="{{ route('videojuegos.index') }}" class="btn btn-primary w-100">
                            Ver Productos
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 text-center p-4">
                    <div class="card-body">
                        <h3 class="mb-3"> Ventas</h3>
                        <p class="text-muted">
                            Revisa las ventas realizadas
                        </p>
                        <a href="{{ route('ventas.index') }}"  class="btn btn-success w-100">
                            Ver Ventas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
