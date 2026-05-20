@extends('layouts.app')

@section('title', 'Videojuegos')

@section('content')
    <div class="container mt-5">

        <form action="">
            <a href="{{ route('videojuegos.create') }}" class="btn btn-success mb-5">+ Registrar videojuego</a>

        </form>
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0 text-center">Listado de Videojuegos</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($videojuegos as $videojuego)
                            <tr>
                                <td class="fw-semibold">{{ $videojuego->nombre }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $videojuego->categoria }}
                                    </span>
                                </td>

                                <td class="text-success fw-bold">
                                    ${{ number_format($videojuego->precio_unitario, 2) }}
                                </td>

                                <td>
                                    @if ($videojuego->cantidad > 10)
                                        <span class="badge bg-success">
                                            {{ $videojuego->cantidad }} disponibles
                                        </span>
                                    @elseif($videojuego->cantidad > 0)
                                        <span class="badge bg-warning text-dark">
                                            {{ $videojuego->cantidad }} disponibles
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Sin stock
                                        </span>
                                    @endif
                                </td>


                                <td>
                                    @if ($videojuego->activo)
                                        <span class="badge bg-success">
                                            activo
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            inactivo
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('videojuegos.show', $videojuego) }}"
                                            class="btn btn-primary btn-sm">
                                            Detalles
                                        </a>

                                        <a href="{{ route('videojuegos.edit', $videojuego) }}"
                                            class="btn btn-warning btn-sm">
                                            Editar
                                        </a>

                                        <form action="{{ route('videojuegos.destroy', $videojuego) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-4">
                                    No hay videojuegos registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
