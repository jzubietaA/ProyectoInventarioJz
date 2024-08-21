<!DOCTYPE html>
<html>
<head>
    <title>Acceso</title>
</head>
<body>
   
    <?php
echo form_open_multipart("usuario/validarusuario");
?>
                <p class="text-center text-condensedLight">Ingresar con su cuenta</p>
			    <form action="home.html">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="text" name="acceso">
				    <label class="mdl-textfield__label" for="acceso">Acceso</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input class="mdl-textfield__input" type="password" name="contrasenia">
				    <label class="mdl-textfield__label" for="contrasenia">Contraseña</label>
				</div>
				<div class="d-grid mt-3">
                <button type="submit" class="btn btn-success">Ingresar</button>
                </div>
	
<?php
echo form_close();
?>
</body>
</html>

