<?php
abstract class BaseDAO {
	private $hayError;
	private $numeroError;
	private $descripcionError;

	public function getHayError(){
		return $this->hayError;
	}

	public function setHayError($pHayError){
		$this->hayError = $pHayError;
	}

	public function getNumeroError(){
		return $this->numeroError;
	}

	public function setNumeroError($pNumeroError){
		$this->numeroError = $pNumeroError;
	}

	public function getDescripcionError(){
		return $this->descripcionError;
	}

	public function setDescripcionError($pDescripcionError){
		$this->descripcionError = $pDescripcionError;
	}

}
?>