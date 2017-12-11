<?php
class Pedido {
    public $idPedido;
    public $clienteID;
    public $costo;
    public $estado;
    public $fecha;
    public $pagoID;
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
            $vSql = "CALL PA_SeleccionarPedido(" . $instPedido->idPedido . " );";
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
            $vSql = "CALL PA_SeleccionarPedido(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Insertar($instPedido) {
        try {
            
            $vSql = "CALL PA_I_Pedido(
          
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