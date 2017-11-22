<?php
require_once 'modelo/BaseDAO.php';
class MySqlDAO extends BaseDAO {
	private $conexion;
	private $resultado;
	private $resultadoDescriptor;
	private $sql;
	private $usuario;
	private $clave;
	private $servidorBD;
	private $BD;
	private static $instance;
	private $enlace;
	public function __construct() {
		// Apertura y formato de archivo de configuracion
		$configuracion = parse_ini_file ( "configuracion.ini", true );
		parent::setHayError ( False );
		parent::setDescripcionError ( "" );
		parent::setNumeroError ( 0 );
		
		$this->usuario = $configuracion ["base_datos"] ["usuario"];
		$this->clave = $configuracion ["base_datos"] ["clave"];
		$this->servidorBD = $configuracion ["base_datos"] ["servidorBD"];
		$this->BD = $configuracion ["base_datos"] ["BD"];
	}
	private function conectar_base_datos() {
		$objeto = new MySqlDAO ();
		
		$this->conexion = $objeto;
		if ($this->conexion->connect_error) {
			die ( 'Error de Conexión (' . $this->conexion->connect_errno . ') ' . $this->conexion->connect_error );
		}
		if (mysqli_connect_error ()) {
			die ( 'Error de Conexión (' . mysqli_connect_errno () . ') ' . mysqli_connect_error () );
		}
	}
	public static function getInstance() {
		// Si la instancia es NULL crea la instancia de MySqlDAO
		if (is_null ( self::$instance )) {
			self::$instance = new MySqlDAO ();
		}
		// Retornar la instancia
		return self::$instance;
	}
	public function AbrirConexion() {
		try {
			$this->conexion = mysqli_connect ( $this->servidorBD, $this->usuario, $this->clave, $this->BD );
		} catch ( Exception $vError ) {
			$this->ActualizarEstadoError ( $vError );
		}
	}
	/**
	 * Ejecuta un query, que devuelve un resultado de registros
	 * @param string $sql query a ejecutar
	 * @param int $formato tipo de formato de resultado
	 * @return el resultado de registros según el formato especificado
	 */
	public function ejecutarSQL($sql, $formato = 1) {
		try {
			$lista = NULL;
			
			mysqli_set_charset ( $this->conexion, 'utf8' );
			if ($resultado = $this->conexion->query ( $sql )) {
				for($num_fila = $resultado->num_rows - 1; $num_fila >= 0; $num_fila --) {
					$resultado->data_seek ( $num_fila );
					// Devuelve un elemento que almacena el resultado
					// Se el tipo dado
					switch ($formato) {
						// Objeto
						case 1 :
							$lista [] = mysqli_fetch_object ( $resultado );
							break;
						// array númerico
						case 2 :
							$lista [] = mysqli_fetch_row ( $resultado );
							break;
						// array asociativo
						case 3 :
							$lista [] = mysqli_fetch_assoc ( $resultado );
							break;
						default :
							$lista [] = mysqli_fetch_object ( $resultado );
							break;
					}
				}
			} else {
				$this->errorBD = "Falló en la ejecución de la sentencia: (" . $this->conexion->errno . ") " . $this->conexion->error;
			}
			$this->conexion->close ();
			return $lista;
		} catch ( Exception $vError ) {
			$this->ActualizarEstadoError ( $vError );
			return null;
		}
	}
	public function ejecutarSQL_DML($sql) {
		try {
			
			$num_resultados = 0;
			$lista = NULL;
			
			mysqli_set_charset ( $this->conexion, 'utf8' );
			if ($resultado = $this->conexion->query ( $sql )) {
				$num_resultados = mysqli_affected_rows ( $this->conexion );
			}
			$this->conexion->close ();
			return $num_resultados;
		} catch ( Exception $vError ) {
			$this->ActualizarEstadoError ( $vError );
			return null;
		}
	}
	public function filas_afectadas() {
		$filas_afectadas = $this->conexion->affected_rows;
		return $filas_afectadas;
	}
	public function extraer_registro() {
		if ($filas = mysqli_fetch_array ( $this->resultado, MYSQL_ASSOC )) {
			// $this->resultado,MYSQLI_NUM
			return $filas;
		} else {
			return false;
		}
	}
	public function error() {
		$error = "Error: " . $this->conexion->errno . " " . $this->conexion->error;
		return $error;
	}
	public function escapar_campo($campo) {
		$campo = $this->conexion->real_escape_string ( $campo );
		return $campo;
	}
	private function ActualizarEstadoError($pError) {
		// Actualizar el estado del error
		parent::setHayError ( True );
		parent::setDescripcionError ( $pError );
	}
	public function ejecutarSQL_prepare($sql, $array_param_tipo, $array_bind_params) {
		/*
		 * Bind parameters. Tipos:
		 * s = string,
		 * i = integer,
		 * d = double,
		 * b = blob
		 */
		$array_params = array ();
		
		$param_tipo = '';
		$n = count ( $array_param_tipo );
		for($i = 0; $i < $n; $i ++) {
			$param_tipo .= $array_param_tipo [$i];
		}
		
		/* Con call_user_func_array, los parámetros de array deben ser pasados por referencia */
		$array_params [] = & $param_tipo;
		
		for($i = 0; $i < $n; $i ++) {
			/* Con call_user_func_array, los parámetros de array deben ser pasados por referencia */
			$array_params [] = & $array_bind_params [$i];
		}
		try {
			$lista = NULL;
			/* Preparar declaración */
			if ($queryPrepare = $this->conexion->prepare ( $sql )) {
				
				/* Usar call_user_func_array, como $ stmt-> bind_param ( 's', $ param); No acepta parametros array */
				call_user_func_array ( array (
						$queryPrepare,
						'bind_param' 
				), $array_params );
				
				/* Ejecución de declaración */
				$queryPrepare->execute ();
				
				/* Obtener resultado en la matriz */
				$res = $queryPrepare->get_result ();
				for($num_fila = $res->num_rows - 1; $num_fila >= 0; $num_fila --) {
					$res->data_seek ( $num_fila );
					$lista [] = mysqli_fetch_object ( $res );
				}
				$this->conexion->close ();
				return $lista;
			}
		} catch ( Exception $vError ) {
			$this->ActualizarEstadoError ( $vError );
			return null;
		}
	}
}
?>