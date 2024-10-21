<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
    <!-- Incluye los archivos CSS y JS necesarios para Material Design Lite -->
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</head>
<body>
    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
        <div class="mdl-tabs__tab-bar">
            <a href="#tabModifyProduct" class="mdl-tabs__tab is-active">Modificar Producto</a>
        </div>
        <div class="mdl-tabs__panel is-active" id="tabModifyProduct">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-title bg-primary text-center titles">
                            Modificar Producto
                        </div>
                        <div class="full-width panel-content">
                        <?php echo form_open_multipart("producto/modificarbd"); ?>
                        <input type="hidden" name="idproducto" value="<?php echo $infoproducto->idProducto; ?>">
                        <input type="hidden" name="foto_actual" value="<?php echo $infoproducto->foto; ?>">
                        <div class="mdl-grid">
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="text" name="nombre" value="<?php echo $infoproducto->nombre; ?>" required>
                                    <label class="mdl-textfield__label" for="nombre">Nombre</label>
                                    <?php echo form_error('nombre'); ?>
                                </div>
                            </div>

                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <textarea class="mdl-textfield__input" name="descripcion" rows="4" required><?php echo $infoproducto->descripcion; ?></textarea>
                                    <label class="mdl-textfield__label" for="descripcion">Descripción</label>
                                    <?php echo form_error('descripcion'); ?>
                                </div>
                            </div>
                            
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="number" name="precio" value="<?php echo $infoproducto->precio; ?>" step="0.01" required>
                                    <label class="mdl-textfield__label" for="precio">Precio</label>
                                    <?php echo form_error('precio'); ?>
                                </div>
                            </div>

                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input class="mdl-textfield__input" type="number" name="stock" value="<?php echo $infoproducto->stock; ?>" required>
                                    <label class="mdl-textfield__label" for="stock">Stock</label>
                                    <?php echo form_error('stock'); ?>
                                </div>
                            </div>

                            <div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <select class="mdl-textfield__input" name="categoria_id" required>
                                        <option value="">Seleccionar categoría</option>
                                        <?php foreach ($categorias as $categoria): ?>
                                            <option value="<?php echo $categoria->idCategoria; ?>" <?php echo ($infoproducto->categoria_id == $categoria->idCategoria) ? 'selected' : ''; ?>>
                                                <?php echo $categoria->nombre_categoria; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('categoria_id'); ?>
                                </div>
                            </div>

                            <div class="mdl-cell mdl-cell--12-col">
                                <label>Subir Foto</label><br>  
                                <input type="file" name="foto"><br>
                                <img src="<?php echo base_url(); ?>uploads/productos/<?php echo $infoproducto->foto; ?>" width="100px" alt="Foto Actual">
                            </div>

                            <div class="mdl-cell mdl-cell--12-col">
                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-modifyProduct">
                                        <i class="zmdi zmdi-edit"></i>
                                    </button>
                                    <div class="mdl-tooltip" for="btn-modifyProduct">Modificar Producto</div>
                                </p>
                            </div>                                   
                        </div>
                        <?php echo form_close(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
