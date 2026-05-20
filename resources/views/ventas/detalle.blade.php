@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h3 class="mb-0">Detalle de Venta</h3>
            </div>

            <div class="card-body">
                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="text-muted">Empleado</label>
                        <p class="fw-bold">{{ $venta->usuario?->name }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Videojuego</label>
                        <p class="fw-bold">{{ $venta->videojuego?->nombre }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Cantidad</label>
                        <p class="fw-bold">{{ $venta->cantidad }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Precio unitario</label>
                        <p class="fw-bold">${{ number_format($venta->precio_venta, 2) }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Subtotal</label>
                        <p class="fw-bold">${{ number_format($venta->subTotal, 2) }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">IVA (%)</label>
                        <p class="fw-bold">{{ number_format($venta->porcentajeIva, 2) }}%</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">IVA</label>
                        <p class="fw-bold">${{ number_format($venta->iva, 2) }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Total</label>
                        <p class="fw-bold fs-4 text-success">${{ number_format($venta->total, 2) }}</p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Estado</label>
                        <p>
                            @if ($venta->vigente)
                                <span class="badge bg-success">Vigente</span>
                            @else
                                <span class="badge bg-danger">No vigente</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-md-6">
                        <label class="text-muted">Fecha de venta</label>
                        <p class="fw-bold">{{ $venta->created_at->format('d/m/Y H:i') }}</p>
                    </div>

                </div>
            </div>

            <div class="card-footer text-end">
                <a href="{{ route('ventas.index') }}" class="btn btn-primary">
                    Volver
                </a>
            </div>
        </div>
    </div>
@endsection
