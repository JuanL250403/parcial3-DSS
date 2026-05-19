@extends('layouts.app')

@section('title', 'Registrar venta')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Regisrar Videojuego</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('ventas.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Videojuego</label>
                            <select type="text" name="videojuego_id" value="{{ old('videojuego_id') }}"
                                class="form-control @error('videojuego_id') is-invalid @enderror">
                                @forelse ($videojuegos as $videojuego)
                                    <option value="{{ $videojuego->id }}" {{ old('videojuego_id') == $videojuego->id ? 'selected' : '' }}>{{ $videojuego->nombre }}</option>
                                @empty
                                    <option>Sin datos</option>
                                @endforelse
                            </select>
                            @error('videojuego_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Cantidad en stock:</label>
                            <input type="number" name="cantidad" value="{{ old('cantidad') }}"
                                class="form-control @error('cantidad') is-invalid @enderror">

                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('ventas.index') }}" class="btn btn-secondary">
                            Volver
                        </a>

                        <button type="submit" class="btn btn-success">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
