<?php
class FormaPago{
    public $idformaPago;
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
            $vSql = "CALL PA_SeleccionarFormaPago(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    
    public static function selectFormaPago($id){
        $info="";
        $iFormaPago=new FormaPago();
        $listado=$iFormaPago->Listar();
        if(!empty($listado)){
            foreach ($listado as $campo){
                $info.= "<option value='".$campo->idformaPago."'";
                if($id!="" && $id==$campo->idformaPago){
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