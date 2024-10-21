<div class="mdl-tabs__panel" id="tabListProduct">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-title bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Lista de Productos</h1>
                </div>
                <br>
                <div class="text-center" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/producto/agregarproducto" class="btn btn-primary mx-2">
                        Agregar Producto
                    </a>
                </div>
                <div class="text-left" style="margin-bottom: 25px;">
                    <a href="<?php echo base_url(); ?>index.php/categorias/lista_categorias" class="btn btn-primary mx-2">
                        Lista por Categorías
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                            <tr>
                                <th>No.</th>
                                <th>Foto</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Categoría</th>
                                <th>Modificar</th>
                                <th>Deshabilitar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
        <?php
        $contador = 1;
        if ($productos) {  // Verificar si $productos no es null
            foreach($productos as $row) { // Cambia a $productos en lugar de $productos->result()
        ?>
        <tr>
            <td><?php echo $contador; ?></td>
            <td>
                <img src="<?php echo base_url(); ?>/uploads/productos/<?php echo ($row->foto != "") ? $row->foto : 'default.png'; ?>" width="50px">
            </td>
            <td><?php echo $row->nombre; ?></td>
            <td><?php echo $row->descripcion; ?></td>
            <td><?php echo $row->precio; ?></td>
            <td><?php echo $row->stock; ?></td>
            <td><?php echo $row->nombre_categoria; ?></td> 

            <td>
                <?php echo form_open_multipart("producto/modificar"); ?>
                <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="zmdi zmdi-edit"></i> Modificar
                </button>
                <?php echo form_close(); ?>
            </td>
            <td>
                <?php echo form_open_multipart("producto/deshabilitarbd"); ?>
                <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                <button type="submit" class="btn btn-warning btn-sm">
                    <i class="zmdi zmdi-block"></i> Deshabilitar
                </button>
                <?php echo form_close(); ?>
            </td>
            <td>
                <?php echo form_open_multipart("producto/eliminarbd"); ?>
                <input type="hidden" name="idproducto" value="<?php echo $row->idProducto; ?>">
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="zmdi zmdi-delete"></i> Eliminar
                </button>
                <?php echo form_close(); ?>
            </td>
        </tr>
        <?php
            $contador++;
            }
        } else {
            echo "<tr><td colspan='10' class='text-center'>No hay productos disponibles.</td></tr>";
        }
        ?>
    </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


