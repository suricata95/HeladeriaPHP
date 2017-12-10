<form id="frm-usuario" action="?c=Sabor&a=Guardar" method="post">
<h2>Edición de sabores</h2>
<input type="hidden" name="idSabor"
		value="<?php echo $rSabor->idSabor;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rSabor->idSabor!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Sabor</label>
	<div class="col-md-10">	
		<input type="text" class="form-control entrada" id="txtSabor" name="txtSabor" value="<?php echo $rSabor->descripcion;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Estado</label>
	<div class="col-md-10">	
		<select class="form-control entrada" id="sltEstado" name="sltEstado">		
	<option value="0"
	<?php echo $rSabor->estado==0?"selected='selected'":"" ?>>Desactivado</option>
					<option value="1"
					<?php echo $rSabor->estado==1?"selected='selected'":"" ?>>Activado</option>
	</select>
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Cantidad</label>
	<div class="col-md-10">	
		<input type="number" class="form-control entrada" id="numCantidad" name="numCantidad" value="<?php echo $rSabor->cantidad;?>">
	</div>

</div>


<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>
