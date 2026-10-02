document.addEventListener('DOMContentLoaded', () => {

    // ===== VALIDACIÓN DEL LOGIN =====
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const btn = document.getElementById('btnLogin');

            if (!email || !password) {
                e.preventDefault();
                mostrarAlerta('Por favor completa todos los campos.');
                return;
            }

            // Mostrar loader
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Ingresando...';
            btn.disabled = true;
        });
    }

    // ===== CARRITO DE VENTAS =====
    const carrito = [];
    const carritoBody = document.getElementById('carritoBody');
    
    if (carritoBody) {
        const totalTexto = document.getElementById('totalTexto');
        const inputCarrito = document.getElementById('inputCarrito');
        const inputTotal = document.getElementById('inputTotal');
        const btnVender = document.getElementById('btnVender');
        const buscador = document.getElementById('buscarProducto');

        document.querySelectorAll('.btn-agregar').forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.dataset.id;
                const nombre = btn.dataset.nombre;
                const precio = parseFloat(btn.dataset.precio);
                const stockMax = parseInt(btn.dataset.stock);

                const existente = carrito.find(item => item.id == id);
                if (existente) {
                    if (existente.cantidad < stockMax) {
                        existente.cantidad++;
                    } else {
                        alert('⚠️ No hay más stock disponible.');
                        return;
                    }
                } else {
                    carrito.push({ id, nombre, precio, cantidad: 1, stockMax });
                }
                renderCarrito();
            });
        });

        function renderCarrito() {
            carritoBody.innerHTML = '';
            let total = 0;
            carrito.forEach((item, index) => {
                const subtotal = item.precio * item.cantidad;
                total += subtotal;
                carritoBody.innerHTML += `
                    <tr>
                        <td>${item.nombre}</td>
                        <td>${item.cantidad}</td>
                        <td>S/ ${subtotal.toFixed(2)}</td>
                        <td><button type="button" class="btn btn-sm btn-danger" onclick="eliminarItem(${index})">×</button></td>
                    </tr>
                `;
            });
            totalTexto.textContent = total.toFixed(2);
            inputCarrito.value = JSON.stringify(carrito);
            inputTotal.value = total.toFixed(2);
            btnVender.disabled = carrito.length === 0;
        }

        window.eliminarItem = (index) => {
            carrito.splice(index, 1);
            renderCarrito();
        };

        if (buscador) {
            buscador.addEventListener('input', (e) => {
                const term = e.target.value.toLowerCase();
                document.querySelectorAll('.producto-item').forEach(item => {
                    item.style.display = item.dataset.nombre.includes(term) ? 'block' : 'none';
                });
            });
        }
    }

    // ===== AUTO-CERRAR ALERTAS =====
    setTimeout(() => {
        document.querySelectorAll('.alert-dismissible').forEach(alert => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        });
    }, 4000);

});

function mostrarAlerta(mensaje) {
    const alertBox = document.getElementById('alertaLogin');
    if (alertBox) {
        alertBox.textContent = mensaje;
        alertBox.style.display = 'block';
    }
}