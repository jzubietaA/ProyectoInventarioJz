<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2>Registrar Venta</h2>

      <?php echo form_open('venta/agregarbd'); ?>

      <div class="form-group">
        <label for="producto_id">Producto:</label>
        <select name="producto_id" id="producto_id" class="form-control form-select form-select-lg" required>
          <option value="" disabled selected>Seleccione un producto...</option>
          <?php
          foreach ($infoProducto->result() as $row) {
            ?>
          <option value="<?php echo $row->id?>"><?php echo $row->producto?></option>
            <?php
          }
          ?>
        </select>
      </div>

      <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" name="total" id="total" class="form-control" step="0.01" placeholder="Ingrese el total" required>
      </div>

      <button type="submit" class="btn btn-primary">Registrar Venta</button>

      <?php echo form_close(); ?>
      
    </div>
  </div>
</div>

