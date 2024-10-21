<div class="mdl-tabs__panel" id="tabListProveedor">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <!-- Encabezado con estilo MDL -->
                <div class="full-width panel-title bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Proveedores</h1>
                </div>
                <br>

                <!-- Botones centrados con estilo MDL -->
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/proveedores/deshabilitados" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent mx-2">
                        Ver Deshabilitados
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/proveedores/agregarProveedor" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary mx-2">
                        Agregar Proveedor
                    </a>
                </div>

                <!-- Tabla con estilo MDL -->
                <div class="table-responsive">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                        <thead>
                            <tr>
                                <th class="mdl-data-table__cell--non-numeric">No.</th>
                                <th class="mdl-data-table__cell--non-numeric">Nombre de la Empresa</th>
                                <th class="mdl-data-table__cell--non-numeric">Email</th>
                                <th class="mdl-data-table__cell--non-numeric">Celular</th>
                                <th class="mdl-data-table__cell--non-numeric">Dirección</th>
                                <th class="mdl-data-table__cell--non-numeric">Fecha Creación</th>
                                <th class="mdl-data-table__cell--non-numeric">Modificar</th>
                                <th class="mdl-data-table__cell--non-numeric">Deshabilitar</th>
                                <th class="mdl-data-table__cell--non-numeric">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach($proveedores->result() as $row) {
                            ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $row->nombreEmpresa; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->celular; ?></td>
                                <td><?php echo $row->direccion; ?></td>
                                <td><?php echo $row->fecha_creacion; ?></td>
                                <td>
                                    <?php echo form_open_multipart("proveedores/modificar"); ?>
                                    <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--primary">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("proveedores/deshabilitarbd"); ?>
                                    <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                                    <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--warning">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <?php echo form_close(); ?>
                                </td>
                                <td>
                                    <?php echo form_open_multipart("proveedores/eliminarbd"); ?>
                                    <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
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
