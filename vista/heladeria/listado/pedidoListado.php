<h2>Listado de pedidos</h2>
<br>
<a href='?c=Pedido&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cliente</th>
      <th scope="col">Costo</th>
      <th scope="col">Estado</th>
      <th scope="col">Fecha</th>
      <th scope="col">Pago</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
if (! empty ( $listado )) {
			foreach ( $listado as $registro ) {
			    
				echo "<tr>
					<td>{$registro->nombre}</td>
					<td>{$registro->costo}</td>
					<td>{$registro->estadox}</td>
					<td>{$registro->fecha}</td> 
                    <td>{$registro->pago}</td>          					
                    <td><a href='?c=DetallePedido&id={$registro->idPedido}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Reserva&a=Datos&id={$registro->idPedido}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>