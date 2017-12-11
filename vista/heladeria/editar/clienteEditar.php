<form id="frm-cliente" action="?c=Cliente&a=Guardar" method="post">
<h2>Edición de clientes</h2>
<input type="hidden" name="idUsuario"
		value="<?php echo $rCliente->idCliente;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rCliente->idCliente!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Nombre</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtNombre" name="txtNombre" value="<?php echo $rCliente->nombre;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Apellidos</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtApellidos" name="txtApellidos" value="<?php echo $rCliente->apellidos;?>">
	</div>

</div>



<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>