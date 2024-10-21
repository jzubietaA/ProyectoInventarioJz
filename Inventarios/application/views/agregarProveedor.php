<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Proveedor</title>
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
        $atributos = array('class'=>'form-control', 'id'=>'formulario');
        echo form_open_multipart('proveedores/agregarbd', $atributos); 
        ?>

        <div class="mdl-tabs__panel is-active" id="tabNewAdmin">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle bg-primary text-center tittles">
                            Nuevo Proveedor
                        </div>
                        <div class="full-width panel-content">
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATA PROVEEDOR</legend><br>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombreEmpresa" value="<?php echo set_value('nombreEmpresa'); ?>" required>
                                        <label class="mdl-textfield__label" for="nombreEmpresa">Nombre de la Empresa</label>
                                        <?php echo form_error('nombreEmpresa'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="email" value="<?php echo set_value('email'); ?>" required>
                                        <label class="mdl-textfield__label" for="email">Correo Electrónico</label>
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="celular" value="<?php echo set_value('celular'); ?>" required>
                                        <label class="mdl-textfield__label" for="celular">Celular</label>
                                        <?php echo form_error('celular'); ?>
                                    </div>
                                </div>
                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="direccion" required>
                                        <label class="mdl-textfield__label" for="direccion">Dirección</label>
                                        <?php echo form_error('direccion'); ?>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center">
                                <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addAdmin">
                                    <i class="zmdi zmdi-plus"></i>
                                </button>
                                <div class="mdl-tooltip" for="btn-addAdmin">Agregar Proveedor</div>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php echo form_close(); ?>
    </div>
</body>
</html>
