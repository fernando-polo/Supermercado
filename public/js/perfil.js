document.addEventListener("DOMContentLoaded", function () {
    let direcciones = JSON.parse(localStorage.getItem("direcciones")) || [];
    let historial = JSON.parse(localStorage.getItem("historial")) || [];

    function cargarDirecciones() {
        let lista = document.getElementById("listaDirecciones");
        lista.innerHTML = "";

        direcciones.forEach((dir, index) => {
            let item = `
                <li class="list-group-item d-flex justify-content-between">
                    ${dir}
                    <div>
                        <button class="btn btn-warning btn-sm editar" data-index="${index}">✏️</button>
                        <button class="btn btn-danger btn-sm eliminar" data-index="${index}">❌</button>
                    </div>
                </li>
            `;
            lista.innerHTML += item;
        });
    }

    document.getElementById("agregarDireccion").addEventListener("click", function () {
        let nuevaDireccion = prompt("Ingrese la nueva dirección:");
        if (nuevaDireccion) {
            direcciones.push(nuevaDireccion);
            localStorage.setItem("direcciones", JSON.stringify(direcciones));
            cargarDirecciones();
        }
    });

    document.getElementById("listaDirecciones").addEventListener("click", function (event) {
        let index = event.target.dataset.index;

        if (event.target.classList.contains("eliminar")) {
            direcciones.splice(index, 1);
            localStorage.setItem("direcciones", JSON.stringify(direcciones));
            cargarDirecciones();
        }

        if (event.target.classList.contains("editar")) {
            let nuevaDireccion = prompt("Modifique la dirección:", direcciones[index]);
            if (nuevaDireccion) {
                direcciones[index] = nuevaDireccion;
                localStorage.setItem("direcciones", JSON.stringify(direcciones));
                cargarDirecciones();
            }
        }
    });

    function cargarHistorial() {
        let tabla = document.getElementById("tablaHistorial");
        tabla.innerHTML = "";

        historial.forEach((compra) => {
            let productosHTML = compra.productos.map(p => `<li>${p.nombre} (${p.cantidad})</li>`).join("");
            let fila = `
                <tr>
                    <td>${compra.fecha}</td>
                    <td><ul>${productosHTML}</ul></td>
                </tr>
            `;
            tabla.innerHTML += fila;
        });
    }

    cargarDirecciones();
    cargarHistorial();
});
