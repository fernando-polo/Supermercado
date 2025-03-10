@extends('layouts.plantilla1')

@section('titulo', 'inicio')  

@section('contenido')
    <h2>Crear Producto</h2>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        
        <label>Descripción:</label>
        <textarea name="descripcion"></textarea>

        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" required>

        <label>Stock:</label>
        <input type="number" name="stock" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
