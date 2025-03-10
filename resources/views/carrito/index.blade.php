@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">🛒 Carrito de Compras</h2>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="tablaCarrito">
            <!-- Los productos se insertarán dinámicamente aquí -->
        </tbody>
    </table>

    <h4 class="text-end">Total: <span id="totalCarrito">$0.00</span></h4>

    <button class="btn btn-success float-end mt-3" id="comprar">Finalizar Compra</button>
</div>
@endsection
