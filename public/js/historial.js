document.addEventListener("DOMContentLoaded", function () {
    // Simulación de datos del historial de compras
    const historialCompras = [
        {
            id: 1,
            fecha: '2025-03-05',
            productos: [
                { nombre: 'Producto A', cantidad: 2, precio: 50 },
                { nombre: 'Producto B', cantidad: 1, precio: 30 },
            ],
            total: 130
        },
        {
            id: 2,
            fecha: '2025-03-07',
            productos: [
                { nombre: 'Producto C', cantidad: 1, precio: 20 },
                { nombre: 'Producto D', cantidad: 3, precio: 15 },
            ],
            total: 95
        }
    ];

    // Cargar el historial de compras en la tabla
    const historialTable = document.getElementById('historialDeCompras');
    historialTable.innerHTML = "";

    historialCompras.forEach(pedido => {
        let row = `
            <tr>
                <td>${pedido.fecha}</td>
                <td>${pedido.productos.length} productos</td>
                <td>$${pedido.total}</td>
                <td><button class="btn btn-info btn-sm verDetalles" data-id="${pedido.id}">Ver detalles</button></td>
            </tr>
        `;
        historialTable.innerHTML += row;
    });

    // Evento para abrir el modal con los detalles del pedido
    document.getElementById('historialDeCompras').addEventListener('click', function (event) {
        if (event.target.classList.contains('verDetalles')) {
            const pedidoId = event.target.dataset.id;
            const pedido = historialCompras.find(p => p.id === parseInt(pedidoId));

            // Llenar el modal con los detalles del pedido
            document.getElementById('fechaPedido').textContent = pedido.fecha;
            document.getElementById('totalPedido').textContent = pedido.total.toFixed(2);

            const productosList = document.getElementById('productosDetalles');
            productosList.innerHTML = "";

            pedido.productos.forEach(producto => {
                let item = `
                    <li class="list-group-item">
                        ${producto.nombre} (x${producto.cantidad}) - $${(producto.precio * producto.cantidad).toFixed(2)}
                    </li>
                `;
                productosList.innerHTML += item;
            });

            // Mostrar el modal
            const modal = new bootstrap.Modal(document.getElementById('modalDetallesPedido'));
            modal.show();
        }
    });
});
