<?php
class Sabor {
    public $idSabor;
    public $descripcion;
    public $estado;
    public $cantidad;
    public $mysql;
    public $hola;
    
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
            $vSql = "CALL PA_SeleccionarSabor(0,2);";
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
            $vSql = "CALL PA_SeleccionarSabor(0,1);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public static function selectSabor($id){
        $info="";
        $iSabor=new Sabor();
        $listado=$iSabor->Listar2();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idSabor."'";
                if($id!="" && $id==$campo->idSabor){
                    $info.=" selected>";
                }else{
                    $info.=">";
                }
                $info.="{$campo->descripcion}</option>";
            }
        }
        return $info;
    }
    
    
    public function ConsultarSabor($instSabor) {
        $resultado = null;
        try {
            $vSql = "CALL PA_SeleccionarSabor(" . $instSabor->idSabor . ",2 );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    
    public function Insertar($instSabor) {
        try {
            
            $vSql = "CALL PA_I_Sabor(
          
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