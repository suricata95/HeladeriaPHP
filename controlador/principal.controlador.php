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
	        echo "funciona";
	    }
	    else {
	        echo "no funciona";
	    }
	    
	    
	}
	
	
}