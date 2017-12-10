<?php
class Usuario {
    public $idUsuario  ;
    public $nombre;
    public $apellidos;
    public $nombreUsuario;
    public $contrasena;
    public $idTipo;
    public $mysql;
    function __construct() {
        try {
            $this->mysql = new MySqlDAO ();
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Consultar($nombreUsuario,$contrasena) {
        
        $resultado=null;
        try {
            $vSql = "CALL ConsultaUsuario ('{$nombreUsuario}','{$contrasena}' );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function ConsultarUsuario($instUsuario) {
        $resultado = null;
        try {
            $vSql = "CALL PA_Seleccionar_Usuario(" . $instUsuario->idUsuario . " );";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL ( $vSql );
            
            return $resultado[0];
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Listar() {
        $resultado = null;
        try {
            $vSql = "CALL PA_Seleccionar_Usuario(0);";
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->EjecutarSQL ( $vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    
    public function Insertar($instUsuario) {
        try {
            var_dump($instUsuario);
            $vSql = "CALL PA_I_Usuario(
            '{$instUsuario->nombre}',
            '{$instUsuario->apellidos}',
            '{$instUsuario->nombreUsuario}',
            '{$instUsuario->contrasena}',
            {$instUsuario->idTipo}
					);";
            
            $this->mysql->AbrirConexion ();
            $resultado = $this->mysql->ejecutarSQL_DML ( $vSql );
            var_dump($vSql );
            return $resultado;
        } catch ( Exception $e ) {
            die ( $e->getMessage () );
        }
    }
    public function Modificar($instUsuario) {
        try {
            $vSql = "CALL PA_M_Usuario(
	        {$instUsuario->idUsuario},
            '{$instUsuario->nombre}',
            '{$instUsuario->apellidos}',
            '{$instUsuario->nombreUsuario}',
            '{$instUsuario->contrasena}',
            {$instUsuario->idTipo}
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