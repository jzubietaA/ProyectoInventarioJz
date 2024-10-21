<div class="mdl-tabs__panel" id="tabListCliente">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-tittle bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Clientes</h1>
                </div>
                <br>
     
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/clientes/deshabilitados" class="btn btn-warning mx-2">
                        Ver Deshabilitados
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/clientes/agregarcliente" class="btn btn-primary mx-2">
                        Agregar Cliente
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                            <tr>
                                <th>No.</th>
                                <th>Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Fecha Creación</th>
                                <th>Modificar</th>
                                <th>Deshabilitar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach($clientes->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $row->nombre; ?></td>
                                <td><?php echo $row->primerApellido; ?></td>
                                <td><?php echo $row->segundoApellido; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->celular; ?></td>
                                <td><?php echo $row->direccion; ?></td>
                                <td><?php echo $row->fecha_creacion; ?></td>
                                <td>
                                    <?php echo form_open_multipart("clientes/modificar"); ?>
                                    <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="zmdi zmdi-edit"></i> Modificar
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("clientes/deshabilitarbd"); ?>
                                    <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="zmdi zmdi-delete"></i> Deshabilitar
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("clientes/eliminarbd"); ?>
                                    <input type="hidden" name="idcliente" value="<?php echo $row->idCliente; ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">
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
