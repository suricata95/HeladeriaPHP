<form id="frm-producto" action="?c=Producto&a=Guardar" method="post">
<h2>Edición de productos</h2>
<input type="hidden" name="idSabor"
		value="<?php echo $rProducto->idProducto;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rProducto->idProducto!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Sabor</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtProducto" name="txtProducto" value="<?php echo $rProducto->descripcion;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Estado</label>
	<div class="col-md-10">	
		<select class="form-control entrada" id="sltEstado" name="sltEstado">		
	<option value="0"
	<?php echo $rProducto->estado==0?"selected='selected'":"" ?>>Desactivado</option>
					<option value="1"
					<?php echo $rProducto->estado==1?"selected='selected'":"" ?>>Activado</option>
	</select>
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Cantidad</label>
	<div class="col-md-10">	
		<input type="number" class="form-control entrada" id="numCantidad" name="numCantidad" value="<?php echo $rProducto->cantidad;?>">
	</div>

</div>


<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>
