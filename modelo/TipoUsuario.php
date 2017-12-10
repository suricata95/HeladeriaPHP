<?php
class TipoUsuario {
    public $idtipoUsuario  ;
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
            $vSql = "select * from tipousuario";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public static function selectTipoUsuario($id){
        $info="";
        $iTipoUsuario=new TipoUsuario();
        $listado=$iTipoUsuario->Listar();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idtipoUsuario."'";
                if($id!="" && $id==$campo->idtipoUsuario){
                    $info.=" selected>";
                }else{
                    $info.=">";
                }           
                $info.="{$campo->descripcion}</option>";
            }
        }
        return $info;
    }
    
    
}
?>