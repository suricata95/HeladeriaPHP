<?php

require_once 'modelo/TipoProducto.php';


class TipoProductoControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new TipoProducto();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/tipoProductoListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rTipoProducto = new Sabor();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rTipoProducto->idtipoProducto = $_GET['id'];
            $rTipoProducto = $this->modelo->ConsultarTipoProducto($rTipoProducto);
            
        }
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rUsuario->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/tipoProductoEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iTipoProducto = new Producto ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iTipoProducto->idtipoProducto=$_POST ["idtipoProducto"];
        $iTipoProducto->descripcion=$_POST ["txtTipoProducto"];
  
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iTipoProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Producto actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iTipoProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Producto registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=TipoProducto&alert=" . urlencode($mensaje));
    }
    
     
}