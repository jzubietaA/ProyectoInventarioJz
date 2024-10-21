<section class="full-width header-well">
    <div class="full-width header-well-icon">
        <i class="zmdi zmdi-shopping-cart"></i>
    </div>
    <div class="full-width header-well-text">
        <p class="text-condensedLight">
            Bienvenido a la lista de ventas. Aquí puedes revisar los detalles de las ventas realizadas, incluyendo productos vendidos y montos totales.
        </p>
    </div>
</section>

<div class="full-width divider-menu-h"></div>

<!-- Formulario de filtro o búsqueda de ventas -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <div class="full-width panel mdl-shadow--2dp">
            <div class="full-width panel-title bg-primary text-center tittles">
                <h2 style="font-size: 24px; padding: 8px; color: #fff;">Buscar Ventas</h2>
            </div>
            <form method="POST" action="<?php echo base_url('index.php/ventas/buscar'); ?>">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--4-col">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="date" id="fecha" name="fecha">
                            <label class="mdl-textfield__label" for="fecha">Fecha</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <div class="mdl-textfield mdl-js-textfield">
                            <input class="mdl-textfield__input" type="text" id="cliente" name="cliente">
                            <label class="mdl-textfield__label" for="cliente">Cliente</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--4-col">
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                            Buscar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tabla de ventas -->
<div class="mdl-grid">
    <div class="mdl-cell mdl-cell--12-col">
        <div class="table-responsive">
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Fecha</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ventas as $venta): ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric"><?= $venta->fecha ?></td>
                        <td><?= $venta->cliente ?></td>
                        <td><?= $venta->producto ?></td>
                        <td><?= $venta->cantidad ?></td>
                        <td>Bs <?= number_format($venta->precio_unitario, 2) ?></td>
                        <td>Bs <?= number_format($venta->cantidad * $venta->precio_unitario, 2) ?></td>
                        <td>
                            <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
