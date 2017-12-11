<form id="frm-detallePedido" action="?c=DetallePedido&a=Guardar" method="post">
<h2>Edición de detalles de pedido</h2>
<input type="hidden" name="idDetallePedido"
		value="<?php echo $rDPedido->iddetallePedido;?>" /> <input
		type="hidden" name="accion"
		value="<?php echo $rDPedido->iddetallePedido!="" ? "U": "I";?>"> 
<div class="form-group">
	<label id="" class="control-label col-md-2">Producto</label>
	<div class="col-md-10">	
	<select class="form-control entrada" id="sltProducto" name="sltProducto">
		<?php echo $productos;?>
	</select>
	</div>

</div>

<div class="form-group">
	<label id="" class="control-label col-md-2">Sabor</label>
	<div class="col-md-10">	
	<select class="form-control entrada" id="sltSabor" name="sltSabor">
		<?php echo $sabores;?>
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