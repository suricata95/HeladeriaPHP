<?php
require_once 'modelo/MySqlDAO.php';

$controlador = 'principal';

// Lógica FrontController
if(!isset($_GET['c']))
{
	require_once "controlador/$controlador.controlador.php";
	$controlador = ucwords($controlador) . 'Controlador';
	$controlador = new $controlador;
	$controlador->Index();
}
else
{
	//Controlador a cargar
	$controlador = strtolower($_GET['c']);
	$accion = isset($_GET['a']) ? $_GET['a'] : 'Index';
	
	// Instancia al controlador específico
	require_once "controlador/$controlador.controlador.php";
	$controlador = ucwords($controlador) . 'Controlador';
	$controlador = new $controlador;
	
	// Llama la accion
	call_user_func( array( $controlador, $accion ) );
	//call_user_func — Llamar a una metodo de retorno dada por el primer parámetro
}