<?php
$pathInfo = pathinfo ( $_SERVER ['PHP_SELF'] );
$directorio = $pathInfo ['dirname'];
$base_url = "http://" . $_SERVER ['SERVER_NAME'] . ":" . $_SERVER ['SERVER_PORT'] . $directorio . "/";
$levels = explode('/', $_SERVER['REQUEST_URI']);
$level=count($levels);
if($level==2){
	$nivel = $directorio;
}
else if($level==4){
	$nivel = $directorio;
}else if($level==5){
	$nivel="..";
}
else{
	$nivel = $directorio;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>Heladería</title>
<meta charset="utf-8" />
<link href="vista/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="vista/js/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="vista/js/popper.min.js"></script>
<script type="text/javascript" src="vista/js/bootstrap.min.js"></script>


</head>
<body>
	<header>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>	
	</header>
	<main role="main">
	<div class="section" id="index-banner">
		<div class="container">