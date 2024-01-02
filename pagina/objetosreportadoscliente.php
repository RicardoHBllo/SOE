<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema de objetos extraviados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.Estilo1 {color: #000000}
-->
</style>
</head>
<body>
<?php
 session_start();
 if(!$_SESSION['usuario']){
 header("Location:index.php");
 }else {if($_SESSION['tipo']==0){
 session_destroy();
 header("Location:index.php");
 }}
?>
<div id="header">
  <ul id="menu">
    <li><a href="index2.php" accesskey="1">Inicio</a></li>
    <li><a href="objetosreportadoscliente.php" accesskey="2">Objetos reportados</a></li>
	<li><a href="reportar.php" accesskey="4">Reportar objetos</a></li>
    <li><a href="salir.php" accesskey="5">salir</a></li>
  </ul>
</div>
<div id="content">
  <div id="colOne">
    <div id="logo">
      <h1><a href="#">SOE</a></h1>
      <h2>Sistema de objetos extraviados. </h2>
    </div>
    <div class="box">
      <h3>Avisos</h3>
      <ul class="bottom">
        <span class="Estilo1">Aviso 1        </span>
        <li class="first Estilo1"></li>
        <li class="Estilo1">Aviso2</li>
      </ul>
    </div>
  </div>
  <div id="colTwo">
    <h2>Lista de Objetos encontrados.</h2>
    <?php

	$link = mysqli_connect("localhost","root","");
	mysqli_select_db($link,"objsExtra");
	$result=mysqli_query($link,"select *,reportes.fecha,reportes.estatus from objetos,reportes where reportes.id_objeto=objetos.id_objeto;");

	echo "<table border='1'>";
	echo "<TR><TD> Estatus </TD><TD> Nombre </TD><TD> Descripcion </TD><TD> Imagen </TD><TD> Fecha </TD></TR>";

	while ($row=mysqli_fetch_array($result)) {
		$id=$row['id_objeto'];
		$nom=$row['nombre'];
		$des=$row['descripcion'];
		$img=$row['imagen'];
		$fec=$row['fecha'];
		if ($row['estatus']=='0') {
			$est='Perdido';
		}
		elseif ($row['estatus']=='1') {
			$est='Encontrado';
		}
		elseif ($row['estatus']=='2') {
			$est='Entregado';
		}
		echo "<TR><TD> $est </TD><TD> $nom </TD><TD> $des </TD><TD> <img src='mis_imagenes/$img' width='70' height='60'> </TD><TD> $fec </TD></TR>";
	}

	echo "</table><br><br>";

	mysqli_free_result($result);
	mysqli_close($link);
	
?>
  </div>
</div>
<div id="footer">
  <p>Copyright (c) 2006 Sitename.com. All rights reserved. Design by <a href="http://freecsstemplates.org/">Free CSS Templates</a>.</p>
</div>
</body>
</html>
