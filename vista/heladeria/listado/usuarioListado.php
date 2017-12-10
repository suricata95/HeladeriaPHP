<h2>Listado de usuarios	</h2>
<br>
<a href='?c=Usuario&a=Datos' class='btn btn-success'>Agregar</a>
         <br>
         <br>               
<table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">NombreUsuario</th>
      <th scope="col">Perfil</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
    
if (! empty ( $listado )) {
			foreach ( $listado as $registro ) {
			    
				echo "<tr>
					<td>{$registro->nombre}</td>
					<td>{$registro->apellidos}</td>
					<td>{$registro->nombreUsuario}</td>
					<td>{$registro->descripcion}</td>           					
                    <td><a href='?c=Usuario&a=Datos&id={$registro->idUsuario}'
                        class='btn btn-warning'>Editar                        
                        </a> 
 <a href='?c=Reserva&a=Datos&id={$registro->idUsuario}'
                        class='btn btn-danger'>Eliminar                        
                        </a></td>
                       
					
					</tr>";
			}
		}
		?>
  </tbody>
</table>