<div class="mdl-tabs__panel" id="tabListCliente">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-tittle bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Proveedores</h1>
                </div>
                <br>
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/proveedores/listaproveedores" class="btn btn-warning mx-2">
                        Ver lista de Proveedores
                    </a>
                    
                </div>
     
                <div class="text-center" style="margin-bottom: 25px;">
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                            <tr>
                                <th>No.</th>
                                <th>Nombre de la Empresa</th>
                                <th>Email</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Fecha Creación</th>
                                <th>Habilitar</th>
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
                                    <?php echo form_open_multipart("proveedores/habilitarbd"); ?>
                                    <input type="hidden" name="idproveedor" value="<?php echo $row->idProveedor; ?>">
                                    <button type="submit" class="btn btn-warning btn-sm">
                                        <i class="zmdi zmdi-delete"></i> Habilitar
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