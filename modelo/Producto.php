<?php
class Producto {
    public $idProducto;
    public $descripcion;
    public $idTipo;
    public $precio;
    public $estado;
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
            $vSql="Select * from Producto;";
            $this->mysql->AbrirConexion();
            $resultado=$this->mysql->ejecutarSQL($vSql);
            return $resultado;
        }catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Consultar($instProducto) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarProducto(" . $instProducto->idProducto . " );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Agregar($instProducto) {
        try {
            
            $vSql = "CALL PA_I_Producto(
            {$instProducto->idProducto},
            '{$instProducto->descripcion}',
            {$instProducto->idTipo},
            {$instProducto->precio},
            {$instProducto->estado}
					);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Modificar($instProducto) {
        try {
            $vSql = "CALL PA_M_Producto(
            
            {$instProducto->idProducto},
            '{$instProducto->descripcion}',
            {$instProducto->idTipo},
            {$instProducto->precio},
            {$instProducto->estado}
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Eliminar($instProducto) {
        try {
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
}
?>