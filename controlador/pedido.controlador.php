<?php

require_once 'modelo/Pedido.php';


class PedidoControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new Pedido();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/pedidoListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rPedido = new Pedido();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rPedido->idPedido = $_GET['id'];
            $rPedido = $this->modelo->ConsultarPedido($rPedido);
            
        }
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rUsuario->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/pedidoEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iPedido = new Pedido ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iPedido->idPedido=$_POST ["idPedido"];
        $iPedido->clienteID=$_POST ["sltCliente"];
        $iPedido->costo=$_POST ["txtCosto"];
        $iPedido->estado=$_POST ["sltEstado"];
        $iPedido->fecha=$_POST ["txtFecha"];
        $iPedido->pagoID=$_POST ["sltPago"];
  
        
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iPedido);
            if ($filasAfectadas > 0) {
                $mensaje = "Pedido actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iPedido);
            if ($filasAfectadas > 0) {
                $mensaje = "Pedido registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Pedido&alert=" . urlencode($mensaje));
    }
    
    
    
}