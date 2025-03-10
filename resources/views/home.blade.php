@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bienvenido a Supermercado</h2>
    
    <!-- Barra de búsqueda -->
    <form action="{{ route('buscar') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Buscar por nombre, precio o categoría" name="filtro">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <!-- Artículos -->
    <div class="row">
        @foreach ($resultados ?? $articulos as $articulo)
        <div class="col-md-3 mb-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $articulo['nombre'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $articulo['nombre'] }}</h5>
                    <p class="card-text">${{ $articulo['precio'] }}</p>
                    <p class="card-text"><small>{{ $articulo['categoria'] }}</small></p>
                    <form action="{{ route('carrito') }}" method="POST">
                        @csrf
                        <input type="hidden" name="articulo_id" value="{{ $articulo['id'] }}">
                        <input type="number" name="cantidad" value="1" min="1" class="form-control mb-2">
                        <button type="submit" class="btn btn-success">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

