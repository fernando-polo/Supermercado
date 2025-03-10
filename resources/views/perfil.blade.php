@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Perfil de Usuario</h2>
    <p><strong>Nombre:</strong> {{ $usuario['nombre'] }}</p>
    <p><strong>Email:</strong> {{ $usuario['email'] }}</p>
    <p><strong>Teléfono:</strong> {{ $usuario['telefono'] }}</p>

    <a href="{{ route('historial') }}" class="btn btn-primary">Ver historial de compras</a>
</div>
@endsection
