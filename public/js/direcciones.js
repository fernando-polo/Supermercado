document.addEventListener('DOMContentLoaded', function () {
    const btnDirecciones = document.getElementById('btnDirecciones');
    const listaDirecciones = document.getElementById('listaDirecciones');

    btnDirecciones.addEventListener('click', function () {
        fetch('/perfil/direcciones')
            .then(response => response.json())
            .then(data => {
                listaDirecciones.innerHTML = '';
                data.forEach(direccion => {
                    let li = document.createElement('li');
                    li.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
                    li.innerHTML = `
                        <div>
                            <strong>${direccion.calle}</strong><br>
                            ${direccion.ciudad}, ${direccion.estado}, CP: ${direccion.cp}
                        </div>
                        <div>
                            <button class="btn btn-warning btn-sm me-2 btnEditar" data-id="${direccion.id}">✏️</button>
                            <button class="btn btn-danger btn-sm btnEliminar" data-id="${direccion.id}">🗑️</button>
                        </div>
                    `;
                    listaDirecciones.appendChild(li);
                });

                new bootstrap.Modal(document.getElementById('modalDirecciones')).show();
            });
    });

    listaDirecciones.addEventListener('click', function (e) {
        if (e.target.classList.contains('btnEliminar')) {
            const id = e.target.dataset.id;
            fetch('/perfil/direcciones/eliminar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id })
            }).then(() => btnDirecciones.click());
        }

        if (e.target.classList.contains('btnEditar')) {
            const id = e.target.dataset.id;
            const direccion = [...listaDirecciones.children].find(li => 
                li.querySelector('.btnEditar').dataset.id == id
            );
            const datos = direccion.querySelector('div:first-child').innerText.split('\n');
            
            const nuevaCalle = prompt('Nueva calle:', datos[0]);
            if (!nuevaCalle) return;
            
            fetch('/perfil/direcciones/actualizar', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id, calle: nuevaCalle })
            }).then(() => btnDirecciones.click());
        }
    });
});
