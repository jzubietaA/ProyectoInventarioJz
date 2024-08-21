<h1>Lista de Usuarios Deshabilitados</h1>

<br>

<a href="<?php echo base_url(); ?>index.php/usuario/listausuario">
<button type="button" class="btn btn-warning">VER HABILITADOS</button>
</a>


<table class="table">
	<thead>
		<th>No.</th>
		<th>Nombre.</th>
		<th>Primer APellido.</th>
		<th>Segundo APellido.</th>
		<th>Habilitar</th>
	</thead>
	<tbody>
		<?php
		$contador=1;
		foreach($usuario->result() as $row)
		{
		?>
		<tr>
			<td><?php echo $contador; ?></td>
			<td><?php echo $row->nombres; ?></td>
			<td><?php echo $row->primerApellido; ?></td>
			<td><?php echo $row->segundoApellido; ?></td>
			<td>
<?php
echo form_open_multipart("usuario/habilitarbd");
?>
<input type="hidden" name="idUsuario" value="<?php echo $row->idUsuario; ?>">
<button type="submit" class="btn btn-warning">Habilitar</button>
<?php
echo form_close();
?>
			</td>
		</tr>
		<?php
		$contador++;
		}
		?>
	</tbody>
</table>