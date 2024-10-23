<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Compras</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Registrar Compra</h2>
    <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url(); ?>index.php/compras/procesarCompra" method="POST"> <!-- Cambié la acción a procesarCompra -->
        <div class="form-group">
            <label for="proveedor_id">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-control" required>
                <option value="">Seleccionar Proveedor</option>
                <?php foreach ($proveedores as $proveedor): ?>
                    <option value="<?= $proveedor->idProveedor; ?>"><?= $proveedor->nombreEmpresa; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
                <div class="form-group col-md-4">
            <label for="fecha">Fecha de Compra</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>


        <h4>Detalles de la Compra</h4>
        <table class="table" id="tablaProductos">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="detalle[0][producto_id]" class="form-control" required>
                            <option value="">Seleccionar Producto</option>
                            <?php foreach ($productos as $producto): ?>
                                <option value="<?= $producto->idProducto; ?>"><?= $producto->nombre; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="detalle[0][cantidad]" class="form-control cantidad" min="0" required>
                    </td>
                    <td>
                        <input type="number" name="detalle[0][precio_unitario]" class="form-control precio_unitario" min="0" step="0.01" required>
                    </td>
                    <td>
                        <input type="text" name="detalle[0][subtotal]" class="form-control subtotal" readonly>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm eliminarProducto">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary" id="agregarProducto">Agregar Producto</button>

        <!-- Mostrar el total de la compra -->
        <div class="form-group mt-3">
            <label for="total">Total</label>
            <input type="text" id="total" name="total" class="form-control" readonly>
        </div>

        <button type="submit" class="btn btn-success mt-3">Registrar Compra</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        var contador = 1;

        // Función para agregar una nueva fila de producto
        $('#agregarProducto').click(function() {
        $('#tablaProductos tbody').append(`
            <tr>
                <td>
                    <select name="detalle[${contador}][producto_id]" class="form-control" required>
                        <option value="">Seleccionar Producto</option>
                        <?php foreach ($productos as $producto): ?>
                            <option value="<?= $producto->idProducto; ?>"><?= $producto->nombre; ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td>
                    <input type="number" name="detalle[${contador}][cantidad]" class="form-control cantidad" min="0" required>
                </td>
                <td>
                    <input type="number" name="detalle[${contador}][precio_unitario]" class="form-control precio_unitario" min="0" step="0.01" required>
                </td>
                <td>
                    <input type="text" name="detalle[${contador}][subtotal]" class="form-control subtotal" readonly>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm eliminarProducto">Eliminar</button>
                </td>
            </tr>
        `);
        contador++;
    });


        // Función para eliminar una fila de producto
        $(document).on('click', '.eliminarProducto', function() {
            $(this).closest('tr').remove();
            calcularTotal();
        });

        // Función para calcular el subtotal y actualizar el total
        $(document).on('input', '.cantidad, .precio_unitario', function() {
            var $fila = $(this).closest('tr');
            var cantidad = $fila.find('.cantidad').val();
            var precioUnitario = $fila.find('.precio_unitario').val();
            var subtotal = cantidad * precioUnitario;

            $fila.find('.subtotal').val(subtotal.toFixed(2));
            calcularTotal();
        });

        // Función para calcular el total de la compra
        function calcularTotal() {
            var total = 0;
            $('.subtotal').each(function() {
                var subtotal = parseFloat($(this).val());
                if (!isNaN(subtotal)) {
                    total += subtotal;
                }
            });
            $('#total').val(total.toFixed(2));
        }
    });
</script>

</body>
</html>

