<?php

require_once 'modelo/Usuario.php';

class UsuarioControlador{
	
    private $modelo;
	
	public function __construct(){
	    
	    $this->modelo = new Usuario();
	}
	
	public function Index(){
	    
	    $listado = $this->modelo->Listar();
	    require_once 'vista/encabezado.php';
	    require_once 'vista/heladeria/listado/usuarioListado.php';
	    require_once 'vista/piepagina.php';
	    
	}
	
	
	
	
	
	
	
}