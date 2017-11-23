<!DOCTYPE h>
<html lang="es">
<head>
<title>Bienvenido</title>
<meta charset="utf-8" />
<link type="text/css" href="vista/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="vista/css/login.css">
<script type="text/javascript" src="vista/js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="vista/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vista/js/popper.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div class = "container">
	<div class="wrapper">
		<form action="?c=Principal&a=comprobar" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Hola de nuevo!</h3>
						  
			  <input type="text" class="form-control" name="NombreUsuario" placeholder="Nombre de usuario" required="" autofocus="" />
			  <input type="password" class="form-control" name="Contraseña" placeholder="Contraseña" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Iniciar Sesión" type="Submit">Login</button>  			
		</form>			
	</div>
</div>
</body>
</html>