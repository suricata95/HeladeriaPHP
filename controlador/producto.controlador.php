<?php

require_once 'modelo/Producto.php';


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
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rProducto->idProducto = $_GET['id'];
            $rProducto = $this->modelo->ConsultarProducto($rProducto);
            
        }
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
        $iProducto->descripcion=$_POST ["txtDescripcion"];
        $iProducto->idTipo=$_POST ["txtTipo"];
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