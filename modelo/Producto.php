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
    
    
    public function Listar() {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarProducto(0,2);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Listar2() {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarProducto(0,1);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public static function selectProducto($id){
        $info="";
        $iProducto=new Producto();
        $listado=$iProducto->Listar2();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idProducto."'";
                if($id!="" && $id==$campo->idProducto){
                    $info.=" selected>";
                }else{
                    $info.=">";
                }
                $info.="{$campo->descripcion}</option>";
            }
        }
        return $info;
    }
    
    
    public function ConsultarProducto($instProducto) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarProducto(" . $instProducto->idProducto . ",2 );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Insertar($instProducto) {
        try {
            
            $vSql = "CALL PA_I_Producto(
           
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