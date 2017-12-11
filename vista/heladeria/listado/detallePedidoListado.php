<h2>Listado de detalles de pedido</h2>
<br>
<a href='?c=DetallePedido&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Sabor</th>   
      <th scope="col">Acción</th>    
    </tr>
  </thead>
  <tbody>
    <?php
    
if (! empty ( $listado )) {
			foreach ( $listado as $registro ) {
			    
				echo "<tr>
					<td>{$registro->producto}</td>
					<td>{$registro->sabor}</td>					         					
                    <td><a href='?c=DetallePedido&a=Datos&id={$registro->idDetallePedido}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Reserva&a=Datos&id={$registro->idDetallePedido}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>