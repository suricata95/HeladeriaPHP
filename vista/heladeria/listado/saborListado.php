<a href='?c=Sabor&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sabor</th>
      <th scope="col">Estado</th>
      <th scope="col">Cantidad</th>      
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
					<td>{$registro->cantidad}</td>					           					
                    <td><a href='?c=Sabor&a=Datos&id={$registro->idSabor}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Reserva&a=Datos&id={$registro->idSabor}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>