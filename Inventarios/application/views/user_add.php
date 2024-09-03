<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <!-- Asegúrate de incluir los archivos CSS y JS necesarios para Material Design Lite -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabNewAdmin" class="mdl-tabs__tab is-active">Nuevo</a>
            
        </div>
            <?php
            $atributos=array('class'=>'form-control','id'=>'formulario');
            echo form_open_multipart('usuario/agregarbd',$atributos); 
            ?>

        <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            Nuevo Usuario
                        </div>
                        <div class="full-width panel-content">
                            <?php echo form_open_multipart("usuario/agregarbd"); ?>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATA ADMINISTRATOR</legend><br>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombres" value="<?php echo set_value('nombres'); ?>" required>
                                        <label class="mdl-textfield__label" for="nombres">Nombres</label>
                                        <?php echo form_error('nombres'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="primerApellido" value="<?php echo set_value('primerApellido'); ?>" required>
                                        <label class="mdl-textfield__label" for="primerApellido">Primer Apellido</label>
                                        <?php echo form_error('primerApellido'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="segundoApellido" value="<?php echo set_value('segundoApellido'); ?>" required>
                                        <label class="mdl-textfield__label" for="segundoApellido">Segundo Apellido</label>
                                        <?php echo form_error('segundoApellido'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="correoElectronico" value="<?php echo set_value('correoElectronico'); ?>" required>
                                        <label class="mdl-textfield__label" for="correoElectronico"> Correo Electronico</label>
                                        <?php echo form_error('correoElectronico'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="acceso" value="<?php echo set_value('acceso'); ?>" required>
                                        <label class="mdl-textfield__label" for="acceso">Acceso</label>
                                        <?php echo form_error('acceso'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="password" name="contrasenia" required>
                                        <label class="mdl-textfield__label" for="contrasenia">Contraseña</label>
                                        <?php echo form_error('contrasenia'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <select class="mdl-textfield__input" name="rol" required>
                                            
                                            <option value="administrador" <?php echo set_select('rol', 'administrador'); ?>>Administrador</option>
                                            <option value="vendedor" <?php echo set_select('rol', 'vendedor'); ?>>Vendedor</option>
                                        </select>
                                        <label class="mdl-textfield__label" for="rol">Rol</label>
                                        <?php echo form_error('rol'); ?>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                                <div class="mdl-tooltip" for="btn-addAdmin">Agregar Usuario</div>
                            </p>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         
    </div>
</body>
</html>




