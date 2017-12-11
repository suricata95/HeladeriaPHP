<?php
class TipoProducto {
    
    public $idtipoProducto  ;
    public $descripcion;

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
            $vSql = "CALL PA_SeleccionarTipoProducto(0)";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public static function selectTipoProducto($id){
        $info="";
        $iTipoProducto=new TipoProducto();
        $listado=$iTipoProducto->Listar();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idtipoProducto."'";
                if($id!="" && $id==$campo->idtipoProducto){
                    $info.=" selected>";
                }else{
                    $info.=">";
                }           
                $info.="{$campo->descripcion}</option>";
            }
        }
        return $info;
    }
    
   
    
    public function ConsultarTipoProducto($instTipoProducto) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarTipoProducto(" . $instTipoProducto->idtipoProducto . " );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public function Insertar($instTipoProducto) {
        try {
            var_dump($instTipoProducto);
            $vSql = "CALL PA_I_TipoProducto(

            {$instTipoProducto->descripcion}
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Modificar($instTipoProducto) {
        try {
            $vSql = "CALL PA_M_TipoProducto(
	        {$instTipoProducto->idtipoProducto},
            {$instTipoProducto->descripcion}
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            
            var_dump($vSql );
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