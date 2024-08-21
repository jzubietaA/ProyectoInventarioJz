<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Estudiante</title>
</head>
<body>
    <h1>Modificar estudiante</h1>
    <br>
    <?php
    foreach($infouser->result() as $row)
    {
    ?>
    <?php echo form_open_multipart("usuario/modificarbd"); ?>
    <p>
        <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
        <?php echo form_error('idUsuario'); ?>
    </p>
    <p>
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="<?php echo $row->nombres; ?>" required>
        <?php echo form_error('nombres'); ?>
    </p>
    <p>
        <label for="primerApellido">Primer Apellido:</label>
        <input type="text" name="primerApellido" value="<?php echo $row->primerApellido; ?>" required>
        <?php echo form_error('primerApellido'); ?>
    </p>
    <p>
        <label for="segundoApellido">Segundo Apellido:</label>
        <input type="text" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>">
        <?php echo form_error('segundoApellido'); ?>
    </p>
    <p>
        <label for="acceso">Acceso:</label>
        <input type="text" name="acceso" value="<?php echo $row->acceso; ?>" required>
        <?php echo form_error('acceso'); ?>
    </p>
    <p>
        <label for="contrasenia">Contraseña:</label>
        <input type="password" name="contrasenia" value="<?php echo $row->contrasenia; ?>" required>
        <?php echo form_error('contrasenia'); ?>
    </p>
    <p>
        <label for="rol">Rol:</label>
        <input type="text" name="rol" value="<?php echo $row->rol; ?>" required>
        <?php echo form_error('rol'); ?>
    </p>
    <p>
        <button type="submit">Modificar</button>
    </p>
    <?php echo form_close(); ?>
    <?php
    } // Cierre del foreach
    ?>
</body>
</html>
