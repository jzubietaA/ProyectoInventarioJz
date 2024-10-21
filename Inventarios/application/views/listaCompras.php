<section class="full-width header-well">
    <div class="full-width header-well-icon">
        <i class="zmdi zmdi-shopping-cart"></i>
    </div>
    <div class="full-width header-well-text">
        <p class="text-condensedLight">
            Aquí puedes ver la lista de compras realizadas en el sistema.
        </p>
    </div>
</section>

<div class="full-width divider-menu-h"></div>
<div class="container mt-5">
    <h2>Lista de Compras</h2>

    <!-- Formulario de búsqueda de compras -->
    <form method="POST" action="<?php echo base_url('index.php/compras/buscar'); ?>" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="fecha" class="form-control" placeholder="Fecha">
            </div>
            <div class="col-md-4">
                <input type="text" name="proveedor" class="form-control" placeholder="Proveedor">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID Compra</th>
                <th>Proveedor</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($compras as $compra): ?>
                <tr>
                    <td><?= $compra->idCompras; ?></td>
                    <td><?= $compra->nombreEmpresa; // Mostrar el nombre del proveedor ?></td>
                    <td><?= date('d-m-Y', strtotime($compra->fecha)); ?></td>
                    <td>Bs <?= number_format($compra->total, 2); ?></td>
                    <td>
                        <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#detalles-<?= $compra->idCompras; ?>">Ver Detalles</button>
                        <div id="detalles-<?= $compra->idCompras; ?>" class="collapse">
                            <ul>
                                <?php if ($compra->idCompraDetalle): // Verifica si hay detalles ?>
                                    <li>Producto ID: <?= $compra->producto_id; ?>, Cantidad: <?= $compra->cantidad; ?>, Precio Unitario: Bs <?= number_format($compra->precio_unitario, 2); ?>, Subtotal: Bs <?= number_format($compra->sub_total, 2); ?></li>
                                <?php else: ?>
                                    <li>No hay detalles para esta compra.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
