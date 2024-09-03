<div class="mdl-tabs__panel" id="tabAddProduct">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="full-width panel mdl-shadow--2dp">
                <div class="full-width panel-title bg-success text-center tittles">
                    <h1 style="font-size: 30px; padding: 8px; color: #fff;">Agregar Producto</h1>
                </div>
                <br>
                <?php echo form_open_multipart('producto/agregarbd'); ?>
                <div class="mdl-grid">
                    <!-- Campo para Nombre -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                    </div>

                    <!-- Campo para Descripción -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>

                    <!-- Campo para Precio -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="precio">Precio:</label>
                            <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
                        </div>
                    </div>

                    <!-- Campo para Stock -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="stock">Stock:</label>
                            <input type="number" name="stock" id="stock" class="form-control" required>
                        </div>
                    </div>

                    <!-- Campo para Categoría -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="categoria_id">Categoría:</label>
                            <select name="categoria_id" id="categoria_id" class="form-control" required>
                                <option value="">Seleccionar categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Campo para Foto -->
                    <div class="mdl-cell mdl-cell--6-col">
                        <div class="form-group">
                            <label for="foto">Foto del Producto:</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

