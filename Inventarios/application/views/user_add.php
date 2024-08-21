<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>
<body>
    <h2>Agregar Usuario</h2>
    <?php echo form_open_multipart("usuario/agregarbd"); ?>
        <p>
            <label for="nombres">Nombres:</label>
            <input type="text" name="nombres" value="<?php echo set_value('nombres'); ?>" required>
            <?php echo form_error('nombres'); ?>
        </p>
        <p>
            <label for="primerApellido">Primer Apellido:</label>
            <input type="text" name="primerApellido" value="<?php echo set_value('primerApellido'); ?>" required>
            <?php echo form_error('primerApellido'); ?>
        </p>
        <p>
            <label for="segundoApellido">Segundo Apellido:</label>
            <input type="text" name="segundoApellido" value="<?php echo set_value('segundoApellido'); ?>" required>
            <?php echo form_error('segundoApellido'); ?>
        </p>
        <p>
            <label for="acceso">Acceso:</label>
            <input type="text" name="acceso" value="<?php echo set_value('acceso'); ?>" required>
            <?php echo form_error('acceso'); ?>
        </p>
        <p>
            <label for="contrasenia">Contraseña:</label>
            <input type="password" name="contrasenia" required>
            <?php echo form_error('contrasenia'); ?>
        </p>
        <p>
            <label for="rol">Rol:</label>
            <input type="text" name="rol" value="<?php echo set_value('rol'); ?>" required>
                <!-- Agrega más roles según sea necesario -->
            <?php echo form_error('rol'); ?>
        </p>
        <p>
            <button type="submit">Guardar</button>
        </p>
    <?php echo form_close(); ?>
</body>
</html>


