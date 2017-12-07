<?php
require_once 'modelo/Usuario.php';
class PrincipalControlador{
	
	
	public function __construct(){
	}
	
	public function Index(){
		
		require_once 'vista/login.php';
		
	}
	public function Comprobar(){
	    $usuario=new Usuario();
	    $resultado=$usuario->Consultar($_POST["NombreUsuario"],$_POST["Contraseña"]);
	    
	    if(isset ($resultado->nombreUsuario) && !empty($resultado->nombreUsuario) ){
	        header("location:index.php?c=Principal&a=Principal&alert=".urlencode("jeje"));
	    }
	    else {
	        echo "no funciona";
	    }
	    
	    
	}
	
	public function Principal(){
	    require_once 'vista/encabezado.php';
	    require_once 'vista/heladeria/principal.php';
	    require_once 'vista/piepagina.php';
	    
	}
	
}