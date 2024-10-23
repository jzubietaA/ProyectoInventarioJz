<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Productos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.indigo-pink.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.min.js"></script>
</head>
<body>
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
            <form method="get" action="<?php echo site_url('reportes'); ?>">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" name="fecha_inicio" id="fecha_inicio" required>

                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" name="fecha_fin" id="fecha_fin" required>

                <label for="nombre_producto">Nombre Producto:</label>
                <input type="text" name="nombre_producto" id="nombre_producto">

                <label for="categoria_id">Categoría:</label>
                <select name="categoria_id" id="categoria_id">
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria->idCategoria; ?>"><?php echo $categoria->nombre; ?></option>
                    <?php endforeach; ?>
                </select>

                <input type="submit" value="Filtrar" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
            </form>
            
            <div class="table-responsive">
                <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">ID Producto</th>
                            <th class="mdl-data-table__cell--non-numeric">Nombre</th>
                            <th class="mdl-data-table__cell--non-numeric">Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $producto->idProducto; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $producto->nombre; ?></td>
                                <td class="mdl-data-table__cell--non-numeric"><?php echo $producto->descripcion; ?></td>
                                <td><?php echo $producto->stock; ?></td>
                                <td><?php echo "Bs " . number_format($producto->precio, 2); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($producto->fecha_creacion)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</body>
</html>



