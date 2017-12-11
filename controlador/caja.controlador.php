<?php

require_once 'modelo/Caja.php';


class CajaControlador{
    
    private $modelo;
    
    public function __construct(){
        
        $this->modelo = new Caja();
    }
    
    public function Index(){
        
        $listado = $this->modelo->Listar();
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/listado/cajaListado.php';
        require_once 'vista/piepagina.php';
        
    }
    
    
    public function Datos()
    {
        $rCaja = new Caja();
        if (isset($_GET['id']) && ! empty($_GET["id"])) {
            $rCaja->idCaja = $_GET['id'];
            $rCaja = $this->modelo->ConsultarCaja($rCaja);
            
        }
        //$tipoUsuarios = TipoUsuario::selectTipoUsuario($rCliente->idTipo);
        require_once 'vista/encabezado.php';
        require_once 'vista/heladeria/editar/cajaEditar.php';
        require_once 'vista/piepagina.php';
    }
    
    public function Guardar()
    {
        $mensaje = "No se logro guardar la informacion o No se realizo ningun cambio";
        
        $iCaja = new Caja ();
        $accion = $_POST ["accion"];
        $mensaje = "";
        $iCaja->idcaja=$_POST ["idCaja"];
        $iCaja->totalInicio=$_POST ["numInicial"];
        $iCaja->totalFin=$_POST ["numFin"];
        $iCaja->fecha=$_POST ["datFecha"];

        // Acciones
        $filasAfectadas = 0;
        if ($_POST['accion'] == "U") {
            // Actualizar
            $filasAfectadas = $this->modelo->Modificar($iCaja);
            if ($filasAfectadas > 0) {
                $mensaje = "Caja actualizado satisfactoriamente";
            }
        } else {
            // Nuevo
            $filasAfectadas = $this->modelo->Insertar($iCaja);
            if ($filasAfectadas > 0) {
                $mensaje = "Caja registrado satisfactoriamente";
            }
        }
        header("location:index.php?c=Caja&alert=" . urlencode($mensaje));
    }
    
    
    
}