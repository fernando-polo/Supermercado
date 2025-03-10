@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historial de Compras</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
            <tr>
                <td>{{ $compra['fecha'] }}</td>
                <td>${{ number_format($compra['total'], 2) }}</td>
                <td>
                    <button class="btn btn-info" onclick="verDetalle({{ $compra['id'] }})" data-bs-toggle="modal" data-bs-target="#modalDetalle">
                        Ver Detalles
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDetalle" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Detalle del Pedido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul id="detalleLista"></ul>
        <p><strong>Total:</strong> $<span id="detalleTotal"></span></p>
      </div>
    </div>
  </div>
</div>

<script>
function verDetalle(id) {
    fetch(`/pedido/${id}`)
    .then(response => response.json())
    .then(data => {
        let detalleLista = document.getElementById('detalleLista');
        detalleLista.innerHTML = '';
        data.productos.forEach(producto => {
            let item = document.createElement('li');
            item.textContent = `${producto.nombre} - ${producto.cantidad} x $${producto.precio}`;
            detalleLista.appendChild(item);
        });
        document.getElementById('detalleTotal').textContent = data.total.toFixed(2);
    });
}
</script>
@endsection
