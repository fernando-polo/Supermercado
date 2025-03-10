@extends('layouts.plantilla1')

@section('titulo', 'inicio')  

@section('contenido')
    <h2>Editar Producto</h2>
    <form action="{{ route('productos.update', $producto) }}" method="POST">
        @csrf @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ $producto->nombre }}" required>

        <label>Descripción:</label>
        <textarea name="descripcion">{{ $producto->descripcion }}</textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $producto->stock }}" required>

        <button type="submit">Actualizar</button>
    </form>
@endsection
