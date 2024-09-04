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
                            Modificar Cliente
                        </div>
                        <div class="full-width panel-content">
                            <?php
                            foreach ($infocliente->result() as $row) {
                                echo form_open_multipart("clientes/modificarbd");
                            ?>
                            <div class="mdl-grid">
                                <div class="mdl-cell mdl-cell--12-col">
                                    <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS DEL Cliente</legend><br>
                                </div>

                                <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                                <?php echo form_error('idCliente'); ?>

                                <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input class="mdl-textfield__input" type="text" name="nombreCliente" value="<?php echo $row->nombre; ?>" required>
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
                                <!-- Campo Email -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="email" name="emailCliente" value="<?php echo $row->email; ?>">
										<label class="mdl-textfield__label" for="emailCliente">E-mail</label>
										<span class="mdl-textfield__error">Correo electrónico inválido</span>
									</div>
								</div>
								<!-- Campo Celular -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="tel" name="celularCliente" value="<?php echo $row->celular; ?>">
										<label class="mdl-textfield__label" for="celularCliente">Celular</label>
										<span class="mdl-textfield__error">Número de celular inválido</span>
									</div>
								</div>
								<!-- Campo Dirección -->
								<div class="mdl-cell mdl-cell--12-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="direccionCliente" value="<?php echo $row->direccion; ?>">
										<label class="mdl-textfield__label" for="direccionCliente">Dirección</label>
										<span class="mdl-textfield__error">Dirección inválida</span>
									</div>
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

