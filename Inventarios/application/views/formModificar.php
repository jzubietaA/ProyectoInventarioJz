<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <!-- Incluye los archivos CSS y JS necesarios para Material Design Lite -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabModifyStudent" class="mdl-tabs__tab is-active">Modificar Usuario</a>
        </div>
        <?php
            
            ?>
        <div class="mdl-tabs__panel is-active" id="tabModifyStudent">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            Modificar Usuario
                        </div>
                        <div class="full-width panel-content">
                            <?php
                            foreach ($infouser->result() as $row) {
                                echo form_open_multipart("usuario/modificarbd");
                            ?>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS DEL USUARIO</legend><br>
                                </div>

                                <input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
                                <?php echo form_error('idUsuario'); ?>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombres" value="<?php echo $row->nombres; ?>" required>
                                        <label class="mdl-textfield__label" for="nombres">Nombres</label>
                                        <?php echo form_error('nombres'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="primerApellido" value="<?php echo $row->primerApellido; ?>" required>
                                        <label class="mdl-textfield__label" for="primerApellido">Primer Apellido</label>
                                        <?php echo form_error('primerApellido'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="segundoApellido" value="<?php echo $row->segundoApellido; ?>" required>
                                        <label class="mdl-textfield__label" for="segundoApellido">Segundo Apellido</label>
                                        <?php echo form_error('segundoApellido'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="acceso" value="<?php echo $row->acceso; ?>" required>
                                        <label class="mdl-textfield__label" for="acceso">Acceso</label>
                                        <?php echo form_error('acceso'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" name="contrasenia" value="<?php echo $row->contrasenia; ?>" required>
                                        <label class="mdl-textfield__label" for="contrasenia">Contraseña</label>
                                        <?php echo form_error('contrasenia'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <select class="mdl-textfield__input" name="rol" required>
                                        <option value="administrador" <?php echo ($row->rol == 'administrador') ? 'selected' : ''; ?>>Administrador</option>
                                        <option value="vendedor" <?php echo ($row->rol == 'vendedor') ? 'selected' : ''; ?>>Vendedor</option>
                                        </select>
                                        <label class="mdl-textfield__label" for="rol">Rol</label>
                                        <?php echo form_error('rol'); ?>
                                    </div>
                                </div>

                                <div class="mdl-cell mdl-cell--12-col">
                                    <label>Subir Foto</label><br>  
                                    <input type="file" name="userfile"><br>
                                </div>

                                <div class="mdl-cell mdl-cell--12-col">
                                    <p class="text-center">
                                        <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-modifyStudent">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button>
                                        <div class="mdl-tooltip" for="btn-modifyStudent">Modificar Usuario</div>
                                    </p>
                                </div>                                   
                            </div>
                            <?php
                                echo form_close();
                            } // Cierre del foreach
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

