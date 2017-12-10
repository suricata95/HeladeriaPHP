<form id="frm-usuario" action="?c=Usuario&a=Guardar" method="post">
<h2>Edición de usuarios</h2>
<input type="hidden" name="idUsuario"
		value="<?php echo $rUsuario->idUsuario;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rUsuario->idUsuario!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Nombre</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtNombre" name="txtNombre" value="<?php echo $rUsuario->nombre;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Apellidos</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtApellidos" name="txtApellidos" value="<?php echo $rUsuario->apellidos;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Usuario</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtUsuario" name="txtUsuario" value="<?php echo $rUsuario->nombreUsuario;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Contraseña</label>
	<div class="col-md-10">	
		<input type="password" class="form-control entrada" id="pasContrasena" name="pasContrasena" value="<?php echo $rUsuario->contrasena;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Perfil</label>
	<div class="col-md-10">	
	<select class="form-control entrada" id="sltTipoUsuario" name="sltTipoUsuario">
	<?php echo $tipoUsuarios?>
	</select>		
	</div>

</div>
<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>