{{-- resources/views/perfil/historial.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📜 Historial de Compras</h2>

    <div class="list-group">
        @foreach ($compras as $compra)
            <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-4 mb-3 shadow-sm border rounded"
                data-bs-toggle="modal" data-bs-target="#modalDetalle{{ $compra['id'] }}">
                <div>
                    <h5 class="mb-1">Pedido #{{ $compra['id'] }}</h5>
                    <p class="mb-0"><strong>Fecha:</strong> {{ $compra['fecha'] }}</p>
                </div>
                <span class="badge bg-primary rounded-pill">${{ $compra['total'] }}</span>
            </button>
        @endforeach
    </div>

    {{-- Modal Detalle del Pedido --}}
    @foreach ($compras as $compra)
        <div class="modal fade" id="modalDetalle{{ $compra['id'] }}" tabindex="-1" aria-labelledby="modalDetalleLabel{{ $compra['id'] }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetalleLabel{{ $compra['id'] }}">Detalles del Pedido #{{ $compra['id'] }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Fecha:</strong> {{ $compra['fecha'] }}</p>
                        <p><strong>Total:</strong> ${{ $compra['total'] }}</p>

                        <h5 class="mt-4 mb-3">Productos:</h5>
                        <ul class="list-group">
                            @foreach ($compra['productos'] as $producto)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $producto['nombre'] }}</span>
                                    <span class="badge bg-info">${{ $producto['precio'] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
