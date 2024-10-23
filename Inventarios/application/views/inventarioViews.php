<section class="full-width header-well">
    <div class="full-width header-well-icon">
        <i class="zmdi zmdi-store"></i>
    </div>
    <div class="full-width header-well-text">
        <p class="text-condensedLight">
            Control de Inventarios: Aquí puedes gestionar todos los productos disponibles en el sistema.
        </p>
    </div>
</section>

<div class="full-width divider-menu-h"></div>

<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
        <div class="table-responsive">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">ID</th>
                        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                        <th class="mdl-data-table__cell--non-numeric">Descripción</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Última Actualización</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($inventarios as $inventario): ?>
                        <tr>
                            <td class="mdl-data-table__cell--non-numeric"><?php echo $inventario->idProducto; ?></td>
                            <td class="mdl-data-table__cell--non-numeric"><?php echo $inventario->nombre; ?></td>
                            <td class="mdl-data-table__cell--non-numeric"><?php echo $inventario->descripcion; ?></td>
                            <td><?php echo $inventario->stock; ?></td>
                            <td><?php echo "Bs " . number_format($inventario->precio, 2); ?></td>
                            <td><?php echo date('d/m/Y', strtotime($inventario->fecha_actualizacion)); ?></td>
                            <td>
                                <a href="<?php echo site_url('inventario/editar/'.$inventario->idProducto); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="<?php echo site_url('inventario/eliminar/'.$inventario->idProducto); ?>" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<a href="<?php echo site_url('inventario/agregar'); ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
    Agregar Producto
</a>



