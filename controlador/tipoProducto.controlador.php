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
        $rTipoProducto = new TipoProducto();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rTipoProducto->idtipoProducto = $_GET['id'];
            $rTipoProducto = $this->modelo->ConsultarTipoProducto($rTipoProducto);
            
        }
       // $tipoProducto = TipoProducto::selectTipoProducto($rTipoProducto->idtipoProducto);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/tipoProductoEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iTipoProducto = new TipoProducto ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iTipoProducto->idtipoProducto=$_POST ["idtipoProducto"];
        $iTipoProducto->descripcion=$_POST ["txtDescripcion"];
        
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iTipoProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Tipo Producto actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iTipoProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Tipo Producto registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=TipoProducto&alert=" . urlencode($mensaje));
    }
    
     
}