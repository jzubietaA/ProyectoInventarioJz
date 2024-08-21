<div class="mdl-tabs__panel" id="tabListAdmin">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-tittle bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Usuario</h1>
                    
                </div>
                <br>
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/usuario/logout" class="btn btn-primary mx-2">
                        Cerrar sesión
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/usuario/deshabilitados" class="btn btn-warning mx-2">
                        Ver Deshabilitados
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/usuario/agregarusuario" class="btn btn-primary mx-2">
                        Agregar Usuario
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                            <tr>
                                <th>No.</th>
                                <th>Nombres</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Rol</th>
                                <th>Modificar</th>
                                <th>Desabilitar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach($usuario->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $row->nombres; ?></td>
                                <td><?php echo $row->primerApellido; ?></td>
                                <td><?php echo $row->segundoApellido; ?></td>
                                <td><?php echo $row->rol; ?></td>
                                <td>
                                    <?php echo form_open_multipart("usuario/modificar"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="btn btn-success btn-lg">
                                        <i class="zmdi zmdi-edit"></i> Modificar
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("usuario/deshabilitarbd"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="btn btn-warning btn-lg">
                                        <i class="zmdi zmdi-delete"></i> Deshabilitar
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("usuario/eliminarbd"); ?>
                                    <input type="hidden" name="idusuario" value="<?php echo $row->idUsuario; ?>">
                                    <button type="submit" class="btn btn-danger btn-lg">
                                        <i class="zmdi zmdi-delete"></i> Eliminar
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




