<!-- reportes/index.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
</head>
<body>
    <div class="container">
    <h2>Generar Reportes</h2>
    <?php echo form_open_multipart("reportes/generar"); ?>
        <div class="form-group">
            <button type="submit" name="reporte_inventario" class="btn btn-primary">Generar Reporte de Inventario</button>
        </div>
        <div class="form-group">
            <button type="submit" name="reporte_ventas" class="btn btn-success">Generar Reporte de Ventas</button>
        </div>
        <div class="form-group">
            <button type="submit" name="reporte_compras" class="btn btn-info">Generar Reporte de Compras</button>
        </div>
    <?php echo form_close(); ?>
</div>

</body>
</html>

