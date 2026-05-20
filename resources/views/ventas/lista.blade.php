@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
    <div class="container mt-5">

        <form action="">
            <a href="{{ route('ventas.create') }}" class="btn btn-success mb-5">+ Registrar venta</a>
        </form>
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0 text-center">Listado de Ventas realizadas</h3>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Videojuego</th>
                            <th>Empleado</th>
                            <th>Estado</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ventas as $venta)
                            <tr>
                                <td class="fw-semibold">{{ $venta->videojuego->nombre }}</td>

                                <td>
                                    <span class="badge bg-primary">
                                        {{ $venta->usuario->name }}
                                    </span>
                                </td>
                                <td>
                                    @if ($venta->vigente)
                                        <span class="badge bg-success">
                                            vigente
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            no vigente
                                        </span>
                                    @endif
                                </td>
                                <td class="fw-bold">
                                    {{ $venta->cantidad }}
                                </td>
                                <td class="text-success fw-bold">
                                    ${{ $venta->total }}
                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('ventas.show', $venta) }}"
                                            class="btn btn-primary btn-sm">
                                            Detalles
                                        </a>
                                        <form action="{{ route('ventas.destroy', $venta) }}" method="POST"
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
                                    No hay ventas registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
