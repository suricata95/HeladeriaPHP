<a href='?c=Producto&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Producto</th>
      <th scope="col">Estado</th>
      <th scope="col">Precio</th>      
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
if (! empty ( $listado )) {
			foreach ( $listado as $registro ) {
			    $estado = $registro->estado > 0?"Activado":"Desactivado";
				echo "<tr>
					<td>{$registro->descripcion}</td>
					<td>{$estado}</td>
					<td>{$registro->precio}</td>					           					
                    <td><a href='?c=Producto&a=Datos&id={$registro->idProducto}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Reserva&a=Datos&id={$registro->idProducto}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>