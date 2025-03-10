{{-- resources/views/perfil/detalle_pedido.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Detalles del Pedido #{{ $pedido['id'] }}</h2>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title">Información del Pedido</h5>
            <p><strong>Fecha del Pedido:</strong> {{ $pedido['fecha'] }}</p>
            <p><strong>Total:</strong> ${{ $pedido['total'] }}</p>

            <h5 class="mt-4 mb-3">Productos en el Pedido:</h5>
            <ul class="list-group">
                @foreach ($pedido['productos'] as $producto)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $producto['nombre'] }}</span>
                        <span class="badge bg-info">${{ $producto['precio'] }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('perfil.historial') }}" class="btn btn-secondary">Volver al Historial</a>
</div>
@endsection
