<?php

require_once 'modelo/Usuario.php';
require_once 'modelo/TipoUsuario.php';

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
    
    
    public function Datos()
    {
        $rUsuario = new Usuario();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rUsuario->idUsuario = $_GET['id'];
            $rUsuario = $this->modelo->ConsultarUsuario($rUsuario);
            
        }
        $tipoUsuarios = TipoUsuario::selectTipoUsuario($rUsuario->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/usuarioEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iUsuario = new Usuario ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iUsuario->idUsuario=$_POST ["idUsuario"];
        
        $iUsuario->nombre=$_POST ["txtNombre"];
        $iUsuario->apellidos=$_POST ["txtApellidos"];
        $iUsuario->nombreUsuario=$_POST ["txtUsuario"];
        $iUsuario->contrasena=$_POST ["pasContrasena"];
        $iUsuario->idTipo=$_POST ["sltTipoUsuario"];
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iUsuario);
            if ($filasAfectadas > 0) {
                $mensaje = "Usuario actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->insertar($iUsuario);
            if ($filasAfectadas > 0) {
                $mensaje = "Usurio registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Usuario&alert=" . urlencode($mensaje));
    }
    
    
    
}