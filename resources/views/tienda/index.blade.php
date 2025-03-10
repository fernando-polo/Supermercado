@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Tienda</h2>

    <input type="text" id="buscarProducto" class="form-control mb-4" placeholder="Buscar producto...">

    <div class="row" id="productosContainer">
        @foreach ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <img src="{{ asset('images/' . $producto['imagen']) }}" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $producto['nombre'] }}</h5>
                        <p class="card-text text-success fw-bold">${{ number_format($producto['precio'], 2) }}</p>
                        <button class="btn btn-primary btnAgregarCarrito" data-id="{{ $producto['id'] }}">Añadir al carrito</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
