<?php 
class Usuario {
    public $idUsuario  ;
    public $nombre;
    public $apellidos;
    public $nombreUsuario;
    public $contraseña;
    public $idTipo;
    public $mysql;
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Consultar($nombreUsuario,$contraseña) {
        $resultado=null;
        try {
            $vSql = "CALL ConsultaUsuario ('{$nombreUsuario}','{$contraseña}' );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
}
?>