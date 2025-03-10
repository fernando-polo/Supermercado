<!-- resources/views/perfil/direcciones.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📍 Direcciones de Envío</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para abrir el modal -->
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalAgregarDireccion">Agregar Dirección</button>

    <!-- Tabla de direcciones -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estado</th>
                <th>Municipio</th>
                <th>Colonia</th>
                <th>Calle</th>
                <th># Casa</th>
                <th>Código Postal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($direcciones as $direccion)
                <tr>
                    <td>{{ $direccion['estado'] }}</td>
                    <td>{{ $direccion['municipio'] }}</td>
                    <td>{{ $direccion['colonia'] }}</td>
                    <td>{{ $direccion['calle'] }}</td>
                    <td>{{ $direccion['numero_casa'] }}</td>  <!-- Mostramos el # casa -->
                    <td>{{ $direccion['codigo_postal'] }}</td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalActualizarDireccion{{ $direccion['id'] }}">Editar</button>
                        <a href="{{ route('perfil.direcciones.eliminar', $direccion['id']) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal para agregar dirección -->
<div class="modal fade" id="modalAgregarDireccion" tabindex="-1" aria-labelledby="modalAgregarDireccionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAgregarDireccionLabel">Agregar Dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perfil.direcciones.agregar') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" required>
                    </div>
                    <div class="mb-3">
                        <label for="municipio" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" required>
                    </div>
                    <div class="mb-3">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" required>
                    </div>
                    <div class="mb-3">
                        <label for="calle" class="form-label">Calle</label>
                        <input type="text" class="form-control" id="calle" name="calle" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_casa" class="form-label">Número de Casa</label>
                        <input type="text" class="form-control" id="numero_casa" name="numero_casa" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigo_postal" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar dirección -->
@foreach ($direcciones as $direccion)
<div class="modal fade" id="modalActualizarDireccion{{ $direccion['id'] }}" tabindex="-1" aria-labelledby="modalActualizarDireccionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalActualizarDireccionLabel">Editar Dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('perfil.direcciones.editar', $direccion['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="estado" name="estado" value="{{ $direccion['estado'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="municipio" class="form-label">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $direccion['municipio'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="colonia" class="form-label">Colonia</label>
                        <input type="text" class="form-control" id="colonia" name="colonia" value="{{ $direccion['colonia'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="calle" class="form-label">Calle</label>
                        <input type="text" class="form-control" id="calle" name="calle" value="{{ $direccion['calle'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_casa" class="form-label">Número de Casa</label>
                        <input type="text" class="form-control" id="numero_casa" name="numero_casa" value="{{ $direccion['numero_casa'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="codigo_postal" class="form-label">Código Postal</label>
                        <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" value="{{ $direccion['codigo_postal'] }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection
