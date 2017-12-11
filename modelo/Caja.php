<?php
class Caja{
    public $idcaja;
    public $totalInicio;
    public $totalFin;
    public $fecha;
    public $mysql;
    
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Insertar($instcaja) {
        try {
            
            $vSql = "CALL PA_I_caja(
            {$instcaja->idcaja},
            {$instcaja->totalInicio},
            {$instcaja->totalFin},
            '{$instcaja->fecha}',
            
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Listar() {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarCaja(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
}
?>