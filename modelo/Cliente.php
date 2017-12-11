<?php
class Cliente {
    public $idCliente;
    public $nombre;
    public $apellidos;
    public $mysql;
    
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Consultar($instCliente) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarCliente (" . $instCliente->idCliente . " );";
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
            $vSql = "CALL PA_SeleccionarCliente(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Insertar($instCliente) {
        try {
            
            $vSql = "CALL PA_I_Cliente(
            '{$instCliente->nombre}',
            '{$instCliente->apellidos}'

					);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Modificar($instCliente) {
        try {
            $vSql = "CALL PA_M_Cliente(
	        {$instCliente->idCliente},
            '{$instCliente->nombre}',
            '{$instCliente->apellidos}'
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