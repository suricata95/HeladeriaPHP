<form id="frm-caja" action="?c=Caja&a=Guardar" method="post">
<h2>Edición de caja</h2>
<input type="hidden" name="idCaja"
		value="<?php echo $rCaja->idcaja;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rCaja->idcaja!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Monto inicial</label>
	<div class="col-md-10">	
		<input type="number" class="form-control entrada" id="numInicial" name="numInicial" value="<?php echo $rCaja->totalInicio;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Monto final</label>
	<div class="col-md-10">	
		<input type="number" class="form-control entrada" id="numFin" name="numFin" value="<?php echo $rCaja->totalFin;?>">
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Fecha</label>
	<div class="col-md-10">	
		<input type="date" class="form-control entrada" id="datFecha" name="datFecha" value="<?php echo $rCaja->fecha;?>">
	</div>

</div>


<div class="form-group">	
	<div class="col-md-10">	
	<button type="submit" class="btn btn-primary">Guardar</button>
	</select>		
	</div>
</div>


</form>