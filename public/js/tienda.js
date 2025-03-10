document.addEventListener("DOMContentLoaded", function () {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    function actualizarCarrito() {
        let tabla = document.getElementById("tablaCarrito");
        let totalCarrito = document.getElementById("totalCarrito");

        tabla.innerHTML = "";
        let total = 0;

        carrito.forEach((producto, index) => {
            let subtotal = producto.precio * producto.cantidad;
            total += subtotal;

            let fila = `
                <tr>
                    <td>${producto.nombre}</td>
                    <td>$${producto.precio.toFixed(2)}</td>
                    <td>${producto.cantidad}</td>
                    <td>$${subtotal.toFixed(2)}</td>
                    <td><button class="btn btn-danger btn-sm eliminar" data-index="${index}">❌</button></td>
                </tr>
            `;
            tabla.innerHTML += fila;
        });

        totalCarrito.innerText = `$${total.toFixed(2)}`;
    }

    document.querySelectorAll(".btnAgregarCarrito").forEach(btn => {
        btn.addEventListener("click", function () {
            let id = this.dataset.id;
            let nombre = this.closest(".card-body").querySelector(".card-title").innerText;
            let precio = parseFloat(this.closest(".card-body").querySelector(".card-text").innerText.replace("$", ""));

            let productoExistente = carrito.find(p => p.id === id);

            if (productoExistente) {
                productoExistente.cantidad++;
            } else {
                carrito.push({ id, nombre, precio, cantidad: 1 });
            }

            localStorage.setItem("carrito", JSON.stringify(carrito));
            alert("Producto agregado al carrito.");
        });
    });

    document.getElementById("tablaCarrito")?.addEventListener("click", function (event) {
        if (event.target.classList.contains("eliminar")) {
            let index = event.target.dataset.index;
            carrito.splice(index, 1);
            localStorage.setItem("carrito", JSON.stringify(carrito));
            actualizarCarrito();
        }
    });

    document.getElementById("comprar")?.addEventListener("click", function () {
        if (carrito.length === 0) {
            alert("El carrito está vacío.");
            return;
        }

        let historial = JSON.parse(localStorage.getItem("historial")) || [];
        historial.push({ fecha: new Date().toLocaleString(), productos: carrito });
        localStorage.setItem("historial", JSON.stringify(historial));

        carrito = [];
        localStorage.setItem("carrito", JSON.stringify(carrito));
        actualizarCarrito();

        alert("¡Compra realizada con éxito!");
    });

    actualizarCarrito();
});
document.getElementById("buscarProducto")?.addEventListener("input", function () {
    let filtro = this.value.toLowerCase();
    let productos = document.querySelectorAll("#productosContainer .card");

    productos.forEach(card => {
        let nombre = card.querySelector(".card-title").innerText.toLowerCase();
        card.style.display = nombre.includes(filtro) ? "block" : "none";
    });
});
