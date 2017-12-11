<h2>Listado de caja</h2>
<br>
<a href='?c=Caja&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Monto inicial</th>
      <th scope="col">Monto final</th> 
      <th scope="col">Fecha</th> 
      <th scope="col">Acción</th>   
    </tr>
  </thead>
  <tbody>
    <?php
    
if (! empty ( $listado )) {
			foreach ( $listado as $registro ) {
			    
				echo "<tr>
					<td>{$registro->totalInicio}</td>
					<td>{$registro->totalFin}</td>
                    <td>{$registro->fecha}</td>					          					
                    <td><a href='?c=Caja&a=Datos&id={$registro->idcaja}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Caja&a=Datos&id={$registro->idcaja}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>