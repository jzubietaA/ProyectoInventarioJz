<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Proveedor</title>
    <!-- Incluye los archivos CSS y JS necesarios para Material Design Lite -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabModifySupplier" class="mdl-tabs__tab is-active">Modificar Proveedor</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabModifySupplier">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-title bg-primary text-center titles">
                            Modificar Proveedor
                        </div>
                        <div class="full-width panel-content">
                            <?php echo form_open_multipart("proveedores/modificarbd"); ?>
                            <?php foreach ($infoproveedor->result() as $row): ?>
                                <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                                <div class="mdl-grid">
                                    <!-- Campos del proveedor -->
                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="nombreEmpresa" value="<?php echo $row->nombreEmpresa; ?>" required>
                                            <label class="mdl-textfield__label" for="nombreEmpresa">Nombre de la Empresa</label>
                                            <?php echo form_error('nombreEmpresa'); ?>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="email" name="email" value="<?php echo $row->email; ?>" required>
                                            <label class="mdl-textfield__label" for="email">Correo Electrónico</label>
                                            <?php echo form_error('email'); ?>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="celular" value="<?php echo $row->celular; ?>" required>
                                            <label class="mdl-textfield__label" for="celular">Celular</label>
                                            <?php echo form_error('celular'); ?>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <input class="mdl-textfield__input" type="text" name="direccion" value="<?php echo $row->direccion; ?>" required>
                                            <label class="mdl-textfield__label" for="direccion">Dirección</label>
                                            <?php echo form_error('direccion'); ?>
                                        </div>
                                    </div>

                                    <div class="mdl-cell mdl-cell--12-col">
                                        <p class="text-center">
                                            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-modifySupplier">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="mdl-tooltip" for="btn-modifySupplier">Modificar Proveedor</div>
                                        </p>
                                    </div>                                   
                                </div>
                            <?php endforeach; ?>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

