<?php
class Sabor {
    public $idSabor;
    public $descripcion;
    public $estado;
    public $cantidad;
    public $mysql;
    
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
   
    
    public function ConsultarTodo(){
        $resultado=null;
        try{
            $vSql="Select * from Sabor;";
            $this->mysql->AbrirConexion();
            $resultado=$this->mysql->ejecutarSQL($vSql);
            return $resultado;
        }catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Consultar($instSabor) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarSabor(" . $instSabor->idSabor . " );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Agregar($instSabor) {
        try {
            
            $vSql = "CALL PA_I_Sabor(
            {$instSabor->idSabor},
            '{$instSabor->descripcion}',
            {$instSabor->estado},
            {$instSabor->cantidad}
					);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Modificar($instSabor) {
        try {
            $vSql = "CALL PA_M_Sabor(
            
            {$instSabor->idSabor},
            '{$instSabor->descripcion}',
            {$instSabor->estado},
            {$instSabor->cantidad}
					);";

            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    
    public function Eliminar($instUsuario) {
        try {
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
}
?>