<!-- Comienza el Card para el formulario de ventas con carrito -->
<div class="card card-flush">
    <!-- Header del card -->
    <div class="card-header">
        <h3 class="card-title">Registrar Venta con Carrito</h3>
    </div>

    <!-- Cuerpo del card con el formulario -->
    <div class="card-body">
        <form id="salesForm" action="<?php echo base_url(); ?>index.php/ventas/procesarVenta" method="POST">

            <!-- Cliente -->
            <div class="mb-3">
                <label for="cliente">Cliente:</label>
                <select id="cliente" name="cliente_id" class="form-select">
                    <option value="">Seleccione un cliente</option> <!-- Opción por defecto -->
                    <?php foreach($clientes as $cliente): ?>
                        <option value="<?= $cliente->idCliente; ?>">
                            <?= $cliente->ci; ?> - <?= $cliente->nombre; ?> <?= $cliente->primerApellido; ?> <?= $cliente->segundoApellido; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Productos -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="producto">Producto:</label>
                    <select id="producto" name="producto_id" class="form-select">
                        <option value="">Seleccione un Producto</option> <!-- Opción por defecto -->
                        <?php foreach($productos as $producto): ?>
                            <option value="<?= $producto->idProducto; ?>" data-precio="<?= $producto->precio; ?>">
                                <?= $producto->nombre; ?> - Bs <?= number_format($producto->precio, 2); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" value="1">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                    <input type="text" id="precio_unitario" class="form-control" readonly>
                </div>
            </div>

            <!-- Mensaje de error -->
            <div id="errorMensaje" class="text-danger mb-3"></div>

            <!-- Botón para agregar producto al carrito -->
            <div class="d-grid gap-2 mb-3">
                <button type="button" id="agregarProducto" class="btn btn-primary">Agregar Producto al Carrito</button>
            </div>

            <!-- Tabla del Carrito de Productos -->
            <div class="table-responsive mb-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total Bs</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody id="carritoProductos">
                        <!-- Aquí se irán agregando los productos dinámicamente -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total General</strong></td>
                            <td id="totalGeneral">Bs 0.00</td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Campo oculto para almacenar el carrito -->
            <input type="hidden" name="carrito" id="carritoInput">

            <!-- Botón para registrar la venta -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Registrar Venta</button>
            </div>
        </form>
    </div>
</div>

<!-- Scripts para manejar el carrito y la validación -->
<script>
    // Variables para almacenar los productos del carrito
    let carrito = [];
    let totalGeneral = 0;

    // Evento para actualizar el precio unitario según el producto seleccionado
    document.getElementById('producto').addEventListener('change', function () {
        let selectedProduct = this.options[this.selectedIndex];
        let precio = selectedProduct.getAttribute('data-precio');
        document.getElementById('precio_unitario').value = precio;
    });

    // Evento para agregar producto al carrito
    document.getElementById('agregarProducto').addEventListener('click', function () {
        let productoSelect = document.getElementById('producto');
        let productoId = productoSelect.value;
        let productoNombre = productoSelect.options[productoSelect.selectedIndex].text.split(' - ')[0]; // Para mostrar solo el nombre
        let cantidad = parseInt(document.getElementById('cantidad').value) || 0;
        let precioUnitario = parseFloat(document.getElementById('precio_unitario').value) || 0;
        let total = cantidad * precioUnitario;

        // Validación de campos
        if (productoId && cantidad > 0 && precioUnitario > 0) {
            // Limpiar mensaje de error
            document.getElementById('errorMensaje').innerText = '';

            // Agregar producto al carrito
            carrito.push({ productoId, productoNombre, cantidad, precioUnitario, total });
            actualizarCarrito();
        } else {
            document.getElementById('errorMensaje').innerText = 'Por favor, seleccione un producto válido y una cantidad mayor que 0.';
        }
    });

    // Función para actualizar el carrito
    function actualizarCarrito() {
        let carritoHTML = '';
        totalGeneral = 0;

        carrito.forEach((producto, index) => {
            totalGeneral += producto.total;
            carritoHTML += `
                <tr>
                    <td>${producto.productoNombre}</td>
                    <td>${producto.cantidad}</td>
                    <td>Bs ${producto.precioUnitario.toFixed(2)}</td>
                    <td>Bs ${producto.total.toFixed(2)}</td>
                    <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button></td>
                </tr>
            `;
        });

        // Actualizar HTML del carrito
        document.getElementById('carritoProductos').innerHTML = carritoHTML;
        
        // Actualizar el total general
        document.getElementById('totalGeneral').innerText = `Bs ${totalGeneral.toFixed(2)}`;

        // Actualizar el campo oculto con el carrito en formato JSON
        document.getElementById('carritoInput').value = JSON.stringify(carrito);
    }

    // Función para eliminar un producto del carrito
    function eliminarProducto(index) {
        carrito.splice(index, 1); // Elimina el producto del carrito por índice
        actualizarCarrito(); // Actualiza el carrito en la vista
    }

    // Validación antes de enviar el formulario
    document.getElementById('salesForm').addEventListener('submit', function (event) {
        if (carrito.length === 0) {
            event.preventDefault();
            document.getElementById('errorMensaje').innerText = 'El carrito no puede estar vacío.';
        }
    });
</script>
