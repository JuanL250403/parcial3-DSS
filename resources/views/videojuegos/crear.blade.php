@extends('layouts.app')

@section('title', 'Editar Videojuego')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Regisrar Videojuego</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('videojuegos.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Nombre:</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}"
                                class="form-control @error('nombre') is-invalid @enderror">
                            @error('nombre')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Categoría:</label>
                            <select name="categoria" id="categoria"
                                class="form-select @error('categoria') is-invalid @enderror">
                                <option value="">Seleccione una categoría</option>

                                <option value="Acción"
                                    {{ old('categoria') == 'Acción' ? 'selected' : '' }}>
                                    Acción
                                </option>

                                <option value="Aventura"
                                    {{ old('categoria') == 'Aventura' ? 'selected' : '' }}>
                                    Aventura
                                </option>

                                <option value="RPG"
                                    {{ old('categoria') == 'RPG' ? 'selected' : '' }}>
                                    RPG
                                </option>

                                <option value="Deportes"
                                    {{ old('categoria') == 'Deportes' ? 'selected' : '' }}>
                                    Deportes
                                </option>

                                <option value="Carreras"
                                    {{ old('categoria') == 'Carreras' ? 'selected' : '' }}>
                                    Carreras
                                </option>
                            </select>
                            @error('categoria')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="fw-bold">Precio:</label>
                            <input type="number" step="0.01" name="precio_unitario" value="{{ old('precio_unitario') }}"
                                class="form-control @error('precio_unitario') is-invalid @enderror">

                            @error('precio_unitario')
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

                        <div class="col-12 mb-3">
                            <label class="fw-bold">Descripción:</label>
                            <textarea name="descripcion" rows="4" class="form-control @error('descripcion') is-invalid @enderror">{{ old('descripcion') }}</textarea>

                            @error('descripcion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('videojuegos.index') }}" class="btn btn-secondary">
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
