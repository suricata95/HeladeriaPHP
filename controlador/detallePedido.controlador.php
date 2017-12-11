<?php

require_once 'modelo/DetallePedido.php';
require_once 'modelo/Producto.php';
require_once 'modelo/Sabor.php';


class DetallePedidoControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new DetallePedido();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar2($_GET["id"]);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/detallePedidoListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rDPedido = new DetallePedido();
        $rDPedido->productoID=1;
        $rDPedido->saborID=1;
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rDPedido->idPedido = $_GET['id'];
            $rDPedido = $this->modelo->ConsultarPedido($rDPedido);
            
        }
        $productos = Producto::selectProducto($rDPedido->productoID);
        $sabores = Sabor::selectSabor($rDPedido->saborID);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/detallePedidoEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iDPedido = new DetallePedido ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iDPedido->iddetallePedido=$_POST ["idDetallePedido"];
        $iDPedido->productoID=$_POST ["sltProducto"];
        $iDPedido->saborID=$_POST ["sltSabor"];
        
  
        
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iDPedido);
            if ($filasAfectadas > 0) {
                $mensaje = "Pedido actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iDPedido);
            if ($filasAfectadas > 0) {
                $mensaje = "Pedido registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Pedido&alert=" . urlencode($mensaje));
    }
    
    
    
}