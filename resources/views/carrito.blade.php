@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Carrito de Compras</h2>

    @if (count($carrito) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $item)
            <tr>
                <td>{{ $item['nombre'] }}</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>${{ $item['precio'] }}</td>
                <td>${{ $item['precio'] * $item['cantidad'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total: </strong>${{ number_format($total, 2) }}</p>
    <button class="btn btn-primary">Realizar Pedido</button>
    @else
    <p>No hay productos en el carrito.</p>
    @endif
</div>
@endsection
