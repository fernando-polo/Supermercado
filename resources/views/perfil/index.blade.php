{{-- resources/views/perfil/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">👤 Perfil de Usuario</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Información Personal</h5>
            <p><strong>Nombre:</strong> Juan Pérez</p>
            <p><strong>Correo:</strong> juanperez@email.com</p>
            <p><strong>Teléfono:</strong> +52 123 456 7890</p>

            <a href="{{ route('perfil.direcciones') }}" class="btn btn-primary mt-3">📍 Gestionar Direcciones</a>
            <a href="{{ route('perfil.historial') }}" class="btn btn-info mt-3">📜 Ver Historial de Compras</a>
        </div>
    </div>
</div>
@endsection
