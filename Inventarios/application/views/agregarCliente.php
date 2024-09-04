<section class="full-width header-well">
	<div class="full-width header-well-icon">
		<i class="zmdi zmdi-accounts"></i>
	</div>
	<div class="full-width header-well-text">
		<p class="text-condensedLight">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde aut nulla accusantium minus corporis accusamus fuga harum natus molestias necessitatibus.
		</p>
	</div>
</section>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	<div class="mdl-tabs__tab-bar">
		<a href="#tabNewClient" class="mdl-tabs__tab is-active">NUEVO</a>
	</div>
	<div class="mdl-tabs__panel is-active" id="tabNewClient">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-title bg-primary text-center tittles">
						Nuevo cliente
					</div>
					<div class="full-width panel-content">
						<?php echo form_open_multipart("cliente/agregarbd"); ?>
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col">
									<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp; DATOS DEL CLIENTE</legend><br>
								</div>
								<!-- Campo Nombre -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="nombreCliente"  value="<?php echo set_value('nombreCliente'); ?>">
										<label class="mdl-textfield__label" for="nombreCliente">Nombre</label>
										<span class="mdl-textfield__error">Nombre inválido</span>
									</div>
								</div>
								<!-- Campo Primer Apellido -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="primerApellido" value="<?php echo set_value('primerApellido'); ?>">
										<label class="mdl-textfield__label" for="primerApellido">Primer Apellido</label>
										<span class="mdl-textfield__error">Apellido inválido</span>
									</div>
								</div>
								<!-- Campo Segundo Apellido -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="segundoApellido" value="<?php echo set_value('segundoApellido'); ?>">
										<label class="mdl-textfield__label" for="segundoApellido">Segundo Apellido</label>
										<span class="mdl-textfield__error">Apellido inválido</span>
									</div>
								</div>
								<!-- Campo Email -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="email" name="emailCliente" value="<?php echo set_value('emailCliente'); ?>">
										<label class="mdl-textfield__label" for="emailCliente">E-mail</label>
										<span class="mdl-textfield__error">Correo electrónico inválido</span>
									</div>
								</div>
								<!-- Campo Celular -->
								<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="tel" name="celularCliente" value="<?php echo set_value('celularCliente'); ?>">
										<label class="mdl-textfield__label" for="celularCliente">Celular</label>
										<span class="mdl-textfield__error">Número de celular inválido</span>
									</div>
								</div>
								<!-- Campo Dirección -->
								<div class="mdl-cell mdl-cell--12-col">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" name="direccionCliente" value="<?php echo set_value('direccionCliente'); ?>">
										<label class="mdl-textfield__label" for="direccionCliente">Dirección</label>
										<span class="mdl-textfield__error">Dirección inválida</span>
									</div>
								</div>
							</div>
							<p class="text-center">
								<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addClient">
									<i class="zmdi zmdi-plus"></i>
								</button>
								<div class="mdl-tooltip" for="btn-addClient">Agregar cliente</div>
							</p>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
