<form id="frm-tipoProducto" action="?c=TipoProducto&a=Guardar" method="post">
<h2>Edición de tipo de producto</h2>
<input type="hidden" name="idtipoProducto"
		value="<?php echo $rTipoProducto->idtipoProducto;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rTipoProducto->idtipoProducto!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Descripción</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtDescripcion" name="txtDescripcion" value="<?php echo $rTipoProducto->descripcion;?>">
	</div>

</div>


<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>