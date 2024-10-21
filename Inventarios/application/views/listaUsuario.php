<div class="mdl-tabs__panel" id="tabListAdmin">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <!-- Encabezado con estilo MDL -->
                <div class="full-width panel-title bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Usuario</h1>
                </div>
                <br>

                <!-- Botones centrados con estilo MDL -->
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/usuario/logout" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mx-2">
                        Cerrar sesión
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/usuario/deshabilitados" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mx-2">
                        Ver Deshabilitados
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/usuario/agregarusuario" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mx-2">
                        Agregar Usuario
                    </a>
                </div>

                <!-- Tabla con estilo MDL -->
                <div class="table-responsive">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">No.</th>
                                <th class="mdl-data-table__cell--non-numeric">Foto</th>
                                <th class="mdl-data-table__cell--non-numeric">Nombres</th>
                                <th class="mdl-data-table__cell--non-numeric">Primer Apellido</th>
                                <th class="mdl-data-table__cell--non-numeric">Segundo Apellido</th>
                                <th class="mdl-data-table__cell--non-numeric">Correo Electrónico</th>
                                <th class="mdl-data-table__cell--non-numeric">Rol</th>
                                <th class="mdl-data-table__cell--non-numeric">Modificar</th>
                                <th class="mdl-data-table__cell--non-numeric">Deshabilitar</th>
                                <th class="mdl-data-table__cell--non-numeric">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach($usuario->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td>
                                    <?php 
                                    $foto = $row->foto;
                                    if($foto == "") {
                                        ?>
                                        <img src="<?php echo base_url(); ?>/uploads/perfil.jpg" width="50px">
                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>/uploads/usuarios/<?php echo $foto; ?>" width="50px">
                                    <?php } ?>
                                </td>
                                <td><?php echo $row->nombres; ?></td>
                                <td><?php echo $row->primerApellido; ?></td>
                                <td><?php echo $row->segundoApellido; ?></td>
                                <td><?php echo $row->correoElectronico; ?></td>
                                <td><?php echo $row->rol; ?></td>
                                <td>
                                    <?php echo form_open_multipart("usuario/modificar"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--primary">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("usuario/deshabilitarbd"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--warning">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("usuario/eliminarbd"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--accent">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                            <?php
                            $contador++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


