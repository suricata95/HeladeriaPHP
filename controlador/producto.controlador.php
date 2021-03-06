<?php

require_once 'modelo/Producto.php';
require_once 'modelo/TipoProducto.php';


class ProductoControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new Producto();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/productoListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rProducto = new Producto();
        $rProducto->tipo=1;
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rProducto->idProducto = $_GET['id'];
            $rProducto = $this->modelo->ConsultarProducto($rProducto);            
        }
        
        $tipoProducto = TipoProducto::selectTipoProducto($rProducto->tipo);
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rUsuario->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/productoEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iProducto = new Producto ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iProducto->idProducto=$_POST ["idProducto"];
        $iProducto->descripcion=$_POST ["txtProducto"];
        $iProducto->idTipo=$_POST ["sltTipo"];
        //$iProducto->idTipo=1;
        $iProducto->precio=$_POST ["numPrecio"];
        $iProducto->estado=$_POST ["sltEstado"];
       
        
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Producto actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iProducto);
            if ($filasAfectadas > 0) {
                $mensaje = "Producto registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Producto&alert=" . urlencode($mensaje));
    }
    
    
    
}