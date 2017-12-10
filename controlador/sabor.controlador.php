<?php

require_once 'modelo/Sabor.php';


class SaborControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new Sabor();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/saborListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rSabor = new Sabor();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rSabor->idSabor = $_GET['id'];
            $rSabor = $this->modelo->ConsultarSabor($rSabor);
            
        }
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rUsuario->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/saborEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iSabor = new Sabor ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iSabor->idSabor=$_POST ["idSabor"];
        $iSabor->descripcion=$_POST ["descripcion"];
        $iSabor->estado=$_POST ["estado"];
        $iSabor->cantidad=$_POST ["cantidad"];
  
        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iSabor);
            if ($filasAfectadas > 0) {
                $mensaje = "Sabor actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iSabor);
            if ($filasAfectadas > 0) {
                $mensaje = "Sabor registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Sabor&alert=" . urlencode($mensaje));
    }
    
    
    
}