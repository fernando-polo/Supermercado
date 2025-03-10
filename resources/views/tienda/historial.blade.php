{{-- resources/views/perfil/historial.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📜 Historial de Compras</h2>

    <div class="list-group">
        @foreach ($compras as $compra)
            <a href="{{ route('perfil.historial.detalle', $compra['id']) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center p-4 mb-3 shadow-sm border rounded">
                <div>
                    <h5 class="mb-1">Pedido #{{ $compra['id'] }}</h5>
                    <p class="mb-0"><strong>Fecha:</strong> {{ $compra['fecha'] }}</p>
                </div>
                <span class="badge bg-primary rounded-pill">${{ $compra['total'] }}</span>
            </a>
        @endforeach
    </div>
</div>
@endsection

