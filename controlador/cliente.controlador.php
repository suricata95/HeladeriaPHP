<?php

require_once 'modelo/Cliente.php';


class ClienteControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new Cliente();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/clienteListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rCliente = new Cliente();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rCliente->idCliente = $_GET['id'];
            $rCliente = $this->modelo->ConsultarCliente($rCliente);
            
        }
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rCliente->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/clienteEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iCliente = new Cliente ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iCliente->idCliente=$_POST ["idCliente"];
        
        $iCliente->nombre=$_POST ["txtNombre"];
        $iCliente->apellidos=$_POST ["txtApellidos"];

        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iCliente);
            if ($filasAfectadas > 0) {
                $mensaje = "Cliente actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iCliente);
            if ($filasAfectadas > 0) {
                $mensaje = "Cliente registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Cliente&alert=" . urlencode($mensaje));
    }
    
    
    
}