<?php
class EstadoPedido{
    public $idestadoPedido;
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
            $vSql = "CALL PA_SeleccionarEstadoPedido(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    
    public static function selectEstadoPedido($id){
        $info="";
        $iEstadoPedido=new EstadoPedido();
        $listado=$iEstadoPedido->Listar();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idestadoPedido."'";
                if($id!="" && $id==$campo->idestadoPedido){
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