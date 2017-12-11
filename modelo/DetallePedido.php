<?php
class DetallePedido {
    public $iddetallePedido;
    public $pedidoID;
    public $productoID;
    public $saborID;
    public $extraID;    
    public $mysql;
    
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Consultar($instPedido) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarDetallePedido(0," . $instPedido->idPedido . " );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Listar() {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarDetallePedido(0,0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Listar2($idPedido) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarDetallePedido({$idPedido},0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Insertar($instPedido) {
        try {
            
            $vSql = "CALL PA_I_DetallePedido(          
            
            {$instPedido->pedidoID},
            {$instPedido->productoID},
            {$instPedido->saborID}
					);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Modificar($instPedido) {
        try {
            $vSql = "CALL PA_M_Pedido(
	        
	        {$instPedido->idPedido},
            {$instPedido->clienteID},
            {$instPedido->costo},
            {$instPedido->estado},
            '{$instPedido->fecha}',
            {$instPedido->pagoID},
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Eliminar($instCliente) {
        try {
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
}
?>